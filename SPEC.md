# §G

Admin private `/admin` → login & CRUD katalog mobil; publik lihat katalog existing.

# §C

- PHP native 8.4 + MySQL Laragon.
- ⊥ link/login admin ∈ navbar/halaman publik.
- Foto mobil → filesystem; metadata → MySQL.
- Existing URL `cars.php` & `car-detail.php?id=<id>` tetap bekerja.
- Password ⊥ plaintext; `password_hash`/`password_verify` only.

# §I

- page: `/admin` → login bila guest | dashboard bila admin.
- page: `/admin/cars.php` → list, create, edit, delete mobil; auth !.
- page: `cars.php` → katalog dari `cars` DB.
- page: `car-detail.php?id=<id>` → detail mobil DB | redirect `cars.php` bila id invalid.
- sql: `database/schema.sql` → tables `admins`, `cars`; existing catalog seed + admin bootstrap documented.
- dir: `uploads/cars/` → validated car images.
- module: `data/cars.php` → company config + existing public helper API; DB-backed catalog.

# §V

V1: ∀ `/admin/*` except login → authenticated admin session !.
V2: ∀ password → hash storage; verify via `password_verify`.
V3: ∀ create/edit car → server validation before DB write.
V4: ∀ uploaded image → MIME/size/extension allowlist & random server filename.
V5: ∀ admin mutation → POST + CSRF valid.
V6: ∀ public catalogue/detail → DB cars; output escaped.
V7: ∀ public navigation → no `/admin` link.
V8: invalid/missing car `id` → redirect `cars.php`.
V9: seed → ∀ existing car + image path preserved in `cars` DB.
V10: login success → session ID regenerate; session cookie HttpOnly, SameSite=Lax.
V11: replaced/deleted upload → its managed file removed; bundled `assets/images/cars/*` ⊥ removed.

# §T

id|status|task|cites
T1|x|add DB schema, PDO config, legacy catalog seed, admin setup docs|I.sql,I.module,V2,V6,V9
T2|.|replace catalog provider; preserve company config + public helpers/pages|I.page,I.module,V6,V8,V9
T3|.|add session auth, login/logout, CSRF helpers|I.page,V1,V2,V5,V10
T4|.|build private dashboard + car CRUD + image lifecycle|I.page,I.dir,V1,V3,V4,V5,V11
T5|.|verify PHP syntax, seed, public catalog, admin controls|V1,V2,V3,V4,V5,V6,V7,V8,V9,V10,V11

# §B

id|date|cause|fix
