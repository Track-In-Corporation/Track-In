<?php
return [
    // Navbar
    'nav' => [
        'inventory' => 'Persediaan',
        'transaction' => 'Transaksi',
    ],

    // Inventory
    'inventory' => [
        'title' => 'Persediaan',
        'create' => 'Menambahkan Produk',

        'category' => [
            'material' => 'Bahan',
            'chemicals' => 'Kimiawi',
            'raw_parts' => 'Raw Mentah',
            'consumables' => 'Habis Pakai',
        ],

        'col' => [
            'code' => 'Kode',
            'type' => 'Jenis',
            'description' => 'Deskripsi',
            'size' => 'Ukuran',
            'brand' => 'Merek',
            'price' => 'Harga',
            'stock' => 'Stok',
        ],

        'detail' => [
            'title' => 'Detail Produk',
            'commercial' => 'Komersial',
            'price' => 'Harga',
            'unit' => 'Satuan',
            'stock' => 'Stok',
            'desc' => 'Informasi tambahan mengenai produk',
            'brand' => 'Merek Produk (Brand)',
            'product_desc' => 'Deskripsi',
            'size' => 'Ukuran',
            'hs_code' => 'Kode HS',
            'origin' => 'Negara Asal',
            'sch' => 'SCH',
            'material_family' => 'Keluarga Material',
            'need_lartas' => 'Perlu LARTAS',
            'need_sni' => 'Perlu SNI',
        ],

        'create' => [
            'title' => 'Tambah Produk',
            'header' => 'Tambah Produk',
            'desc' => 'Masukkan data produk untuk menambahkannya ke dalam inventaris.',

            'identity' => [
                'h2' => 'Identitas Produk',
                'h3' => 'Pilih Jenis Produk',
                'h3_desc' => 'Beberapa produk memiliki detail yang berbeda untuk diinput.',

                'type' => [
                    'consumables' => 'Barang Habis Pakai',
                    'chemicals' => 'Bahan Kimia',
                    'raw_parts' => 'Bagian Mentah',
                    'materials' => 'Material',
                ],

                'input' => [
                    'desc' => 'Deskripsi Produk',
                ],
            ],

            'specification' => [
                'h3' => 'Spesifikasi Teknis',
                'h3_desc' => 'Masukkan informasi teknis mengenai produk seperti jenis, satuan, kategori, dll.',
                'additional' => 'Dapat memilih lebih dari satu',
                'size' => 'Ukuran',
                'unit' => 'Satuan',
                'material' => 'Material'
            ],

            'commercial' => [
                'h3' => 'Informasi Komersial',
                'h3_desc' => 'Masukkan informasi komersial mengenai produk.',
                'input' => [
                    'price' => 'Harga per Satuan',
                    'stock' => 'Stok',
                ],
            ],

            'submit' => 'Tambahkan Produk'
        ],

        'edit' => [
          'h3' => "Ubah Barang",
          'h3_desc' => "Perbarui informasi barang pada inventaris",
          'submit' => 'Simpan Perubahan'
        ]
    ],

      // Transactions
    'transactions' => [
          'title' => 'Transaksi',

          'col' => [
              'code' => 'Kode',
              'seller' => 'Penjual',
              'buyer' => 'Pembeli',
              'date' => 'Tanggal',
              'status' => 'Status',
          ],

          'detail' => [
              'title' => 'Detail Transaksi',
              'date_made' => 'Tanggal Dibuat',
              'name' => 'Nama',
              'address' => 'Alamat',
              'price_h3' => 'Rincian Harga',
              'price_h3_desc' => 'Perhitungan semua produk dalam transaksi.',
              'subtotal' => 'Subtotal',
              'tax' => 'Pajak',
          ],

          'create' => [
              'title' => 'Buat Transaksi',
              'header' => 'Buat Transaksi',
              'desc' => 'Masukkan data produk untuk membuat Transaksi baru.',

              'information' => [
                  'h2' => 'Informasi Transaksi',
                  'h3' => 'Jenis Produk',
                  'h3_desc' => 'Beberapa produk memiliki detail input yang berbeda.',

                  'h4' => 'Pilih Produk',
                  'h4_desc' => 'Pilih produk yang ingin dimassukkan ke transaksi.',

                  'type' => [
                      'consumables' => 'Produk Konsumsi',
                      'chemicals' => 'Bahan Kimia',
                      'raw_parts' => 'Suku Cadang',
                      'materials' => 'Material',
                  ],

                  'input' => [
                      'company_name' => 'Nama Perusahaan',
                      'company_address' => 'Alamat Perusahaan',
                  ],

              ],

              'submit' => 'Selesaikan'
          ],

          'edit' => [
              'h3' => 'Ubah Transaksi',
              'h3_desc' => 'Perbarui informasi transaksi yang dipilih.',
              'submit' => 'Simpan Perubahan'
          ],
      ],

      'user' => [
          'title' => 'Manajemen User',

          'col' => [
              'user_info' => 'Informasi User',
              'user_role' => 'Peran',
              'user_last_update' => 'Terakhir Diubah',
          ],

          'create' => [
            'title' => 'Daftarkan User',
            'desc' => 'Masukan data untuk menambahkan data user baru.',
            'submit' => 'Daftarkan User'
          ],

          'edit' => [
              'title' => 'Detail User',

              'information' => [
                  'date_joined' => 'Tanggal Bergabung',
                  'last_changed' => 'Terakhir Diubah',
                  'usn' => 'Username',
                  'email' => 'Email',
                  'phone' => 'Nomor Telepon',
                  'role' => 'Peran',
                  'submit' => 'Simpan',
                  'password' => "Password"
              ],
          ],
      ],

      // Login
    'login' => [
        'title' => 'Masuk',
        'header' => 'Selamat Datang Kembali!',
        'header_desc' => 'Masukkan kredensial akun Track-In Anda untuk menggunakan aplikasi!',
        'input' => [
            'email' => 'Email',
            'pass' => 'Kata Sandi',
            'remember_me' => 'Ingat Saya',
        ],
        'footer' => '© Hak Cipta Track-In 2025. Seluruh Hak Cipta Dilindungi.',
    ],

    // Register
    'register' => [
        'title' => 'Daftar',
        'header' => 'Buat Akun',
        'header_desc' => 'Daftar ke Track-In untuk melihat produk dan transaksi. Tinggal di Track-In aja!',
        'input' => [
            'full_name' => 'Nama Lengkap',
            'email' => 'Email',
            'pass' => 'Kata Sandi',
            'remember_me' => 'Ingat Saya',
            'submit' => 'Daftar',
            'has_acc' => 'Sudah punya akun?',
            'login' => 'Masuk',
        ],
        'footer' => '© Hak Cipta Track-In 2025. Seluruh Hak Cipta Dilindungi.',
    ],

    'deleteModal' => [
      'title' => 'Apakah Anda Yakin?',
      'desc' => 'Apakah anda yakin ingin menghapus data ini? Tindakan ini bersifat permanen dan tidak dapat dipulihkan.',
      'confirm' => 'Ya, Saya Yakin',
      'decline' => 'Tidak, Batalkan',
    ],

    'utils' => [
        'search' => 'Cari...',
        'filter' => 'Pilih Filter',
        'stock' => [
            'low' => 'Stok Rendah',
            'medium' => 'Stok Menengah',
            'ready' => 'Stok Siap',
        ],
        'add' => 'Tambahkan',
        'page' => 'Halaman',
        'of' => 'dari',
        'admin' => 'Admin',
        'user' => 'User',
        'units' => 'Units',
        'total' => 'Total',
        'chosen' => 'Terpilih'
    ],

    'status-dropdown' => [
        'title' => "Ubah Status",
        'pending' => [
            'title' => 'Pending',
            'description' => 'Barang baru ditambahkan dan belum diproses.',
        ],
        'on-delivery' => [
            'title' => 'Dalam Pengiriman',
            'description' => 'Barang sedang dikirim.',
        ],
        'waiting-payment' => [
            'title' => 'Menunggu Pembayaran',
            'description' => 'Pembayaran belum diterima.',
        ],
        'completed' => [
            'title' => 'Selesai',
            'description' => 'Transaksi telah selesai.',
        ],
    ],
    'transaction-status' => [
        'pending' => "Pending",
        'on-delivery' => 'Pengiriman',
        'waiting-payment' => "Pembayaran",
        'completed' => "Selesai"
    ]
];
