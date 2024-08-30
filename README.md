# Package Dependencies
- jwt-auth
- predis

# Run Instructions / Installation
1. Install the required packages:
```bash
composer install
```
1. Run migrations and seeders:
```bash
php artisan migrate --seed
```
1. Run the server:
```bash
php artisan serve
```
# Explanation
## Database
- `penulis`: Table ini berisi data penulis yang akan melakukan login.
- `berita`: Table ini berisi data berita yang akan diakses oleh penulis. Memiliki relation many-to-one dengan table `penulis`.
- `kategori_berita`: Table ini berisi data kategori berita yang akan memiliki relation one-to-one dengan table `berita`.
- `artist`: Table ini berisi data artist yang akan memiliki relation one-to-one dengan table `berita`.

## API

### Auth API

- `POST /api/login`: API ini digunakan untuk login penulis. API ini akan mengembalikan token JWT yang akan digunakan untuk mengakses API lainnya.
- `POST /api/me`: API ini digunakan untuk mendapatkan data penulis yang sedang login.
- `POST /api/logout`: API ini digunakan untuk logout penulis.

### Berita API

- `GET /api/berita/{id}`: API ini digunakan untuk mendapatkan data berita berdasarkan ID. API ini hanya bisa diakses oleh penulis yang sudah login. Menggunakan Redis sebagai cache.
- `POST /api/berita`: API ini digunakan untuk menambahkan data berita. API ini hanya bisa diakses oleh penulis yang sudah login.
- `PUT /api/berita/{id}`: API ini digunakan untuk mengupdate data berita. API ini hanya bisa diakses oleh penulis yang sudah login.
- `DELETE /api/berita/{id}`: API ini digunakan untuk menghapus data berita. API ini hanya bisa diakses oleh penulis yang sudah login.

## Postman Collection
[Postman Collection](https://www.postman.com/orbital-module-pilot-23220323/workspace/technical-test-cip/collection/37125986-48a7884f-2785-4a39-83f6-ba96d0c6c50a?action=share&creator=37125986)