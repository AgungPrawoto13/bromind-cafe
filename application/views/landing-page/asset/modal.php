<!-- order single -->
<div class="modal fade cart-single show" id="singleCart" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header" id="cart-single-button">
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body" id="list-cart-single">
				<div class="title">Cart</div>
				<script type="text/javascript">

					if(JSON.parse(localStorage.getItem('items')) == 0){
						
                        localStorage.removeItem('items');
                        window.location.reload();

					}else if(JSON.parse(localStorage.getItem('items')) == null){
                        
                        document.write('kosong');
                    }

                    else {

                        //set variabel global, agar bisa di akses antar function

                        var data_cart = JSON.parse(localStorage.getItem('items'));
                        var produk_cart = document.getElementsByClassName('produk_cart');
                        var cart_product_id = '';
                        var cart_qty = '';
                                
                        for(let i = 0; i<data_cart.length; i++){
                            document.write('<div class="form-group col-xl-12 mt-5 produk_cart"><div class="row"><div class="col-12 col-xl-6"><div class="col-xl-12 col-8 margin-auto cart-image"><img src='+data_cart[i].image+' class="w=100"></div></div><div class="col-xl-5 col-11" id="produk_name"><div class="produk_title mt-3">'+data_cart[i].product_name+'</div><div class="idr" id="price'+i+'">Rp <span class="amount">'+data_cart[i].price+'</span></div><div class="count mt-4">Qty<span class="input-group-btn"><button onclick="button_down('+i+');" type="button" class="btn btn-sm btn-danger rounded-0 btn-number less_qty" position="1" id="'+i+'"><i class="fas fa-minus"></i></button></span><input min="0" type="number" id="qty" value='+data_cart[i].qty+' class="qty col-xl-5 margin-left"><span class="input-group-btn"><button type="button" id="'+i+'" class="btn btn-sm btn-danger rounded-0 btn-number add_qty" position="1" onclick="button_up('+i+');"><i class="fas fa-plus"></i></button></span></div></div><div class="col-xl-1 col-1 h-25 remove"><a href="#" class="text-dark" onclick="hapus('+data_cart[i].id+');"><i class="far fa-trash-alt"></i></a></div></div></div>');

                            cart_product_id += [","+data_cart[i].product_id];
                            cart_qty += [","+data_cart[i].qty];
                        }

                        function button_up(data){

                            console.log(data);

                            for(let i = 0; i<produk_cart.length; i++){

                                let tambah_value = parseInt(produk_cart[i].children[0].children[1].children[2].children[2].children[0].id);
                                
                                 //untuk memastikan bahwa tombol pada qty nilainya tidak nyasar pada qty yang lain, fungsi dari stepDown untuk mengurangi nilai pada input bertype number, kalo stepUp untuk menambah nilai pada input bertype number

                                if(tambah_value == data){

                                    //memberikan nilai angka pada input type=number
                                    produk_cart[i].children[0].children[1].children[2].children[1].stepUp();
                                    total_bayar();
                                } 
                            }
                        }

                        function button_down(data){

                            for(let i = 0; i<produk_cart.length; i++){

                                let kurang_value = parseInt(produk_cart[i].children[0].children[1].children[2].children[0].children[0].id);

                                if(kurang_value == data){

                                    //memberikan nilai angka pada input type=number
                                    produk_cart[i].children[0].children[1].children[2].children[1].stepDown()
                                    total_bayar();
                                }
                            }
                        }

                        function total_bayar(){
                            
                            let sum = 0;
                            let jumbar = 0;
                            let order_list = '';
                            
                            for(let i = 0; i<produk_cart.length; i++){

                                //variabel disini berfungsi untuk mendapatkan nilai element

                                let name = produk_cart[i].children[0].children[1].children[0].innerHTML;
                                let price = parseInt(produk_cart[i].children[0].children[1].children[1].children[0].innerHTML);
                                let total_qty = parseInt(produk_cart[i].children[0].children[1].children[2].children[1].value);
                            
                                if(total_qty < 0){
                                    total_qty = 0;
                                }
                                //varibel jumbar disini untuk menadapatkan hasil perkalian dari harga dan qty, kalo udh dapet isinya maka, akan di jumlah dan dimasukan kedalam variabel sum 

                                jumbar = price * total_qty;
                                sum += jumbar;
                                order_list += [ name +" "+total_qty+", "];

                            }

                            //mencegah nilai subtotal menjadi mines
                            if(sum < 0){
                                document.getElementById('total_price').innerText = 0;
                            }else{
                                document.getElementById('total_price').innerText = sum;
                            }

                            //untuk menampilkan href di tombol order
                            document.getElementById('order').href ="https://api.whatsapp.com/send?phone=+6287744379926&text=saya ingin memesan produk " + order_list + "total bayar Rp " +sum;

                            //document.getElementById('order').href="landingPage/tes"+tes;
                        }

                        function hapus(data){

                            //berfungsi untuk mencari posisi objek dalam array, jika posisi sudah didapatkan maka posisi tersebut akan dihapus dari aray menggunakan splice, jika sudah dihapus maka data tersebut akan disimpan kembali kedalam localstorage untuk memperui data

                            let cari = data_cart.findIndex(x=> x.id === data);
                            data_cart.splice(cari,1);
                            localStorage.setItem('items',JSON.stringify(data_cart));

                            window.location.reload();

                        }

                        
                        document.write('<hr class="mt-5 bg-dark"><div class="form-group col-xl-11 m-auto"><div class="row"><div class="col-xl-8 subtotal"><label>Subtotal</label></div><div class="col-xl-4 row">Rp<h6 id="total_price" class="total_pprice w-50 mt-1 ml-1"></h6></div></div></div></div><div class="form-group col-xl-12 btn-orer"><div class="col-xl-8 m-auto"><a href="" class="btn btn-danger form-control" id="order" target="blank">order</a></div></div></div>');

                        total_bayar();
					}
                    // $('#order').on('click',function(){
                    //     $.ajax({
                    //         type:'post',
                    //         url: '<?= base_url('landingPage/tes');?>',
                    //         data:{
                    //             product_id : cart_product_id,
                    //             qty : cart_qty,
                    //             harga : 7
                    //         },
                    //         success: function(data){
                    //             console.log(data.status)

                    //             if(data.status){
                    //                 window.open("https://api.whatsapp.com/send?phone=+6287744379926&text=saya ingin memesan produk " + order_list + "total bayar Rp " +sum);
                    //             }
                                
                    //         }
                    //     });
                    // });

				</script>
			</div>
		</div>
	</div>
</div>

<?php
$i = 0;
$cart_session = @$this->session->userdata('cart_session');



foreach($product as $pd) : ?>
<div class="modal fade prodetail" id="MenuDetail<?= $pd->product_id;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header" style="border-bottom: none;">
                <a type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;
                          <!-- <i class="fas fa-times"></i> -->
                    </span>
                </a>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row desktop">
                        <div class="col-6" id="img">
                            <img src="<?= base_url('assets/img/product/'). $pd->product_img; ?>" class="border border-dark w-100">
                        </div>
                        <div class="col-6" id="desc">
                            <div class="row">
                                <div class="col-12" id="proname">
                                    <?= $pd->product_name; ?>
                                </div>
                                <div class="col-12" id="proprice">
                                    <?= $pd->price; ?>
                                </div>
                                <div class="col-12" id="prodesc">
                                    <?= $pd->description;?>
                                </div>
                                <div class="row px-3" id="m-bottom">
                                    <div class="col-12" id="qty">
                                        <div class="row">
                                            <div class="col-1 mr-2" id="text">Qty</div>
                                            <div class="col" id="number">
                                                <div class="input-group">
                                                    <span class="input-group-btn">
                                                        <button type="button" class="btn btn-sm btn-danger rounded-0 btn-number less_qty" position="<?= $i;?>">
                                                            <i class="fas fa-minus"></i>
                                                        </button>
                                                    </span>
                                                    <input type="number" class="form-control text-center input-number qty<?= $pd->product_id;?> mx-2" value="1"
                                                    onkeypress="return numbOnly(event)" id="qty[<?= $i;?>]">
                                                    <input type="text" value="<?= $pd->product_id;?>" hidden>
                                                    <span class="input-group-btn">
                                                        <button type="button" class="btn btn-sm btn-danger rounded-0 btn-number add_qty" position="<?= $i;?>">
                                                            <i class="fas fa-plus"></i>
                                                        </button>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col btn-d" id="btn">
                                        <a href="https://api.whatsapp.com/send?phone=+6287744379926&text=saya ingin memesan produk <?php echo $pd->product_name;?> harga <?php echo $pd->price;?>" target="blank" class="btn btn-danger rounded-0 mr-4" target="blank">Order</a>
                                        <button type="button" id="add" product_id="1" class="btn btn-outline-danger rounded-0 ShoppingCart">Add to Cart</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- mobile -->  
                    <div class="row mobile">
                        <div class="col-12 text-center" id="img">
                            <img src="<?= base_url('assets/img/product/'). $pd->product_img; ?>">
                        </div>
                        <div class="col-12" id="desc">
                            <div class="row">
                                <div class="col-12" id="proname">
                                    <?= $pd->product_name;?>
                                </div>
                                <div class="col-12" id="proprice">
                                    <?= $pd->price;?>
                                </div>
                                <div class="col-12" id="prodesc">
                                    <?= $pd->description;?>
                                </div>
                                <div class="row px-3" id="m-bottom">
                                    <div class="col-12" id="qty">
                                        <div class="row">
                                            <div class="col-1 mr-2" id="text">Qty</div>
                                            <div class="col" id="number">
                                                <div class="input-group">
                                                    <span class="input-group-btn">
                                                        <button type="button" class="btn btn-sm btn-danger rounded-0 btn-number less_qty" position="<?= $i;?>">
                                                            <i class="fas fa-minus"></i>
                                                        </button>
                                                    </span>
                                                    <input type="number" class="form-control text-center qty<?= $pd->product_id;?> mx-2" value="<?= @$cart_session[$pd->product_id] ?>"
                                                    onkeypress="return numbOnly(event)" id="qty[<?= $i;?>]">
                                                    <input type="text" value="<?= $pd->product_id;?>">
                                                    <span class="input-group-btn">
                                                        <button type="button" class="btn btn-sm btn-danger rounded-0 btn-number add_qty" position="<?= $i;?>">
                                                            <i class="fas fa-plus"></i>
                                                        </button>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer" style="border-top: none;">
                                        <a href="https://api.whatsapp.com/send?phone=+6287744379926&text=saya ingin memesan produk <?php echo $pd->product_name;?> harga <?php echo $pd->price;?>" id="order" target="blank" class="btn btn-danger rounded-0">Order</a>
                                        <button type="button" id="add" class="btn btn-outline-danger rounded-0 ShoppingCart">Add to Cart</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end mobile -->
                </div>
            </div>    
        </div>
    </div>
</div>
<?php 
$i ++;
endforeach ?>


