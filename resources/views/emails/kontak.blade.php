<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Pesan Kontak Baru</title>
</head>

<body style="margin:0; padding:0; background-color:#f9fafb; font-family:ui-sans-serif, system-ui, sans-serif;">
    <div
        style="max-width:640px; margin:0 auto; padding:2rem; background-color:#ffffff; border-radius:1rem; box-shadow:0 4px 6px rgba(0,0,0,0.1);">
        <h2 style="font-size:1.5rem; font-weight:700; color:#1f2937; text-align:center; margin-bottom:0.5rem;">
            📬 Pesan Baru dari Snapstures Studio
        </h2>
        <p style="text-align:center; color:#6b7280; font-size:0.9rem; margin-bottom:2rem;">
            Diterima melalui formulir kontak website
        </p>

        <div style="margin-bottom:1rem;">
            <p style="margin:0 0 0.5rem; font-weight:600; color:#374151;">Nama</p>
            <p style="margin:0; background:#f3f4f6; padding:0.75rem 1rem; border-radius:0.5rem; color:#111827;">
                {{ $nama }}</p>
        </div>

        <div style="margin-bottom:1rem;">
            <p style="margin:0 0 0.5rem; font-weight:600; color:#374151;">Email</p>
            <p style="margin:0; background:#f3f4f6; padding:0.75rem 1rem; border-radius:0.5rem; color:#111827;">
                {{ $email }}</p>
        </div>

        <div style="margin-bottom:1rem;">
            <p style="margin:0 0 0.5rem; font-weight:600; color:#374151;">Subjek</p>
            <p style="margin:0; background:#f3f4f6; padding:0.75rem 1rem; border-radius:0.5rem; color:#111827;">
                {{ $subjek }}</p>
        </div>

        <div style="margin-bottom:1rem;">
            <p style="margin:0 0 0.5rem; font-weight:600; color:#374151;">Pesan</p>
            <p
                style="margin:0; background:#f3f4f6; padding:1rem; border-radius:0.5rem; color:#111827; white-space:pre-line;">
                {{ $pesan }}</p>
        </div>

        <hr style="margin:2rem 0; border:none; border-top:1px solid #e5e7eb;">

        <p style="text-align:center; font-size:0.8rem; color:#9ca3af;">
            Email ini dikirim otomatis dari <strong>Snapstures Studio</strong> – Harap jangan membalas ke email ini.
        </p>
    </div>
</body>

</html>
