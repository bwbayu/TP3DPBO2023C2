# TP3DPBO2023C2
Saya Bayu Wicaksono NIM 2106836 mengerjakan TP3 dalam mata kuliah Desain dan Pemrograman Berorientasi Objek untuk keberkahanNya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.

## Deskripsi Tugas
Buatlah program menggunakan bahasa pemrograman PHP dengan
spesifikasi sebagai berikut:
- Program bebas, kecuali program Ormawa
- Menggunakan minimal 3 buah tabel
- Terdapat proses Create, Read, Update, dan Delete data
- Memiliki fungsi pencarian dan pengurutan data (kata kunci bebas)
- Menggunakan template/skin form tambah data dan ubah data yang sama
- 1 tabel pada database ditampilkan dalam bentuk bukan tabel, 2 tabel sisanya ditampilkan dalam bentuk tabel (seperti contoh saat praktikum)
- Menggunakan template/skin tabel yang sama untuk menampilkan tabel

## Desain program
![design_database](https://github.com/bwbayu/TP3DPBO2023C2/assets/100755457/f923ad77-9928-4bc4-ad38-3eaa4bd10265)

Pada program ini terdapat 3 tabel, yaitu :
1. Tabel Idol memiliki 10 entitas dan memiliki relasi *many to one* dengan tabel idol_group dan role, dimana 1 idol hanya memiliki 1 idol_group dan role. Tabel ini berisi data-data dari idol seperti nama, tanggal lahir, dll.
2. Tabel idol_group memiliki 2 entitas dan memiliki relasi *one to many* dengan tabel idol, dimana 1 idol_group dapat dimiliki oleh banyak idol. Tabel ini berisi data dari idol group seperti nama group.
3. Tabel role memiliki 2 entitas dan memiliki relasi *one to many* dengan tabel idol, dimana 1 role dapat dimiliki oleh banyak idol. Tabel ini berisi data dari role dari idol seperti nama role.

## Penjelasan alur
1. Pada halaman home, user diperlihatkan data-data idol yang tersedia, user dapat mencari idol melalui form pencarian di kanan atas, user juga dapat melihat detail dari idol dengan menekan idol yang ingin dilihat detailnya.
2. Pada halaman detail idol, user diperlihatkan data detail dari idol. Pada halaman ini, user juga dapat mengupdate data idol dengan menekan update button yang akan mengarahkan user ke form update dan user juga dapat menghapus data idol dengan menekan delete button.
3. Untuk menambahkan data idol, user dapat menekan add data idol di bagian navbar yang akan mengarahkan user ke form tambah data.
4. Untuk melihat data group yang tersedia, user dapat menekan daftar group di navbar. Pada halaman daftar group, user dapat melihat data group yang tersedia. Selain itu, di sebelah kanan tabel, disediakan form jika user ingin menambahkan data group. User juga dapat memperbaharui data group tertentu dengan menekan tombol pensil di tabel action, setelah user menekan tombol untuk edit data, maka form disebelah kanan akan terisi dengan data group tersebut. User juga dapat menghapus data group dengan menekan tombol tempat sampah pada tabel action.
5. Untuk melihat data role yang tersedia, user dapat menekan daftar role di navbar. Pada halaman daftar role, user dapat melihat data role yang tersedia. Selain itu, di sebelah kanan tabel, disediakan form jika user ingin menambahkan data role. User juga dapat memperbaharui data role tertentu dengan menekan tombol pensil di tabel action, setelah user menekan tombol untuk edit data, maka form disebelah kanan akan terisi dengan data role tersebut. User juga dapat menghapus data role dengan menekan tombol tempat sampah pada tabel action.

## Dokumentasi 
- Home Page
![Screenshot (312)](https://github.com/bwbayu/TP3DPBO2023C2/assets/100755457/a6ad2aa7-61c0-4a51-902b-d0ebb0b0879d)


- Detail Page
![Screenshot (319)](https://github.com/bwbayu/TP3DPBO2023C2/assets/100755457/2dc4142a-8a1c-4902-bf87-0f854fde62f4)


- Form Page
![Screenshot (314)](https://github.com/bwbayu/TP3DPBO2023C2/assets/100755457/533b6fe4-a554-45f8-83f1-3d94c198c094)


- Daftar Group Page
![Screenshot (315)](https://github.com/bwbayu/TP3DPBO2023C2/assets/100755457/c1b87be5-3002-4ded-a37e-5b3553389caf)


- Daftar Role Page
![Screenshot (317)](https://github.com/bwbayu/TP3DPBO2023C2/assets/100755457/f718c4b7-c59f-481b-bbd5-ab2e673337cc)

- Video
https://youtu.be/oEVRNNNFYFw
