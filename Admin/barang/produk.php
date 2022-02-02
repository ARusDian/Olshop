<div>
        
        <div class="card">
        <div class="card-header">
                <h3 class="card-title">LIST PRODUK</h3>

                <div class="card-tools">
                    <div class="input-group-append">
                    <a href="index.php?halaman=tambahproduk"><button type="button" class="btn btn-block btn-outline-primary" >tambah</button></a>

                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Harga Barang</th>
                    <th scope="col">Stok Barang</th>
                    <th scope="col">Jenis Barang</th>
                    <th scope="col">Deskripsi Barang</th>
                    <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    
                <?php

                include('../../koneksi.php');
                $data = mysqli_query($koneksi,"SELECT * FROM barang") or die(mysqli_connect_error($koneksi));
                $no = 1;
            
                while($row = mysqli_fetch_assoc($data)){
            ?>
                <tr>
                    <td><?= $no; ?> </td>
                    <td><img src="../../assets/images/product/<?=$row['gambar'] ;?>"width="90"> </td>
                    <td><?= $row ['nama'];?> </td>
                    <td><?= $row ['harga'];?> </td>
                    <td><?= $row ['stok'];?> </td>
                    <td><?= $row ['jenis'];?> </td>
                    <td><?= $row ['deskripsi'];?> </td>
                    <td>
                    <a href="index.php?halaman=edit&id=<?= $row['id']; ?>" ><img src="../../assets/icon/Edit.png"width="40px;" height="40px;"  ></a>
                        <a href="index.php?halaman=hapus&id=<?= $row['id']; ?>" onclick="return confirm('yakin dihapus')"><img src="../../assets/icon/Delete.png"width="40px;" height="40px;"></a>
                    </td>
                </tr>
               
            <?php
                $no++;}
            ?> 


            </tbody>
        </table>
              </div>
              <!-- /.card-body -->
            </div>
    </div>
        
        