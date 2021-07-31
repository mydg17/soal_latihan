<div class="container">
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Preview Latihan Soal [ Paket : <?= $datapaketan[0]['kategori']; ?>]
                </div>
                <div class="card-body">
                <?php 
                    $row = $datapaketan;
                    $no = 1;
                    for( $i=0; $i< count($row); $i++ ){
                ?>
                    <div class="col">
                        <?= $no++.". ".$row[$i]['pertanyaan']; ?>
                    </div>
                    <div class="col mb-3 ml-3">
                        <?php
                        $datapilgan = $this->pilgan->getPilgan_byID($row[$i]['soal']);
                        for( $a=0; $a< count($datapilgan); $a++ ){
                            echo $datapilgan[$a]['order_pilgan'].". ".$datapilgan[$a]['text_pilgan']."<br>";
                        }
                        ?>
                    </div>
                <?php
                    }
                ?>
                </div>
            </div>
        
        </div>
    </div>
</div>


   
    </body>
</html>