# Setup database & admin

1. Copy `config/database.local.example.php` to `config/database.local.php` when MySQL credentials differ from Laragon defaults.
2. Run from project root:

   ```powershell
   php database/setup.php --email=admin@example.com --password="replace-with-12-or-more-characters" --name="Administrator"
   ```

3. Open `/admin` and sign in with that email and password.

The setup command creates database `prasetya_rent_car`, imports schema, seeds current catalog once, and creates the first admin. Re-running it does not overwrite existing cars or an existing admin.

For hosting, set `DB_HOST`, `DB_PORT`, `DB_NAME`, `DB_USER`, `DB_PASSWORD`, and optionally `DB_CHARSET` as server environment variables. Keep `config/database.local.php` out of version control.
