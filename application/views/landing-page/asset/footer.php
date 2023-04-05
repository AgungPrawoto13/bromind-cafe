<!-- Footer -->
<footer>
    <div class="row">
        <div class="col-sm-8 col-lg-4" id="story">
            <h4>Story</h4>
            <?php foreach ($story as $str) : ?>
                <p>
                    <?= substr($str->p1, 0, 500) . '...'; ?>
                </p>
            <?php endforeach ?>
        </div>
        <?php foreach ($website as $web) : ?>
        <div class="col-sm-12 col-lg-4" id="open">
            <h4>We Are</h4>
            <img src="<?= base_url('assets/');?>img/OPEN.svg" alt="OPEN">
            <table>
                <tr>
                    <td>Monday - Friday</td>
                    <td id="space"></td>
                    <td><?= $web['senju'] ?></td>
                </tr>
                <tr>
                    <td>Saturday</td>
                    <td id="space"></td>
                    <td><?= $web['sabtu'] ?></td>
                </tr>
                <tr>
                    <td>Sunday</td>
                    <td id="space"></td>
                    <td><?= $web['weekend'] ?></td>
                </tr>
            </table>
        </div>
        <!-- Line White 1 -->
        <div class="d-none" id="ln-1"></div>
        <div class="col-sm-12 col-lg-3" id="floc">
            <div id="foll">
                <h4>Follow Us</h4>
                <ul>
                    <li>
                        <a href="<?= $web['yt'] ?>">
                            <div id="swhite" class="text-center">
                                <i class="fab fa-youtube align-bottom"></i>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="<?= $web['ig'] ?>">
                            <div id="swhite" class="text-center">
                                <i class="fab fa-instagram align-bottom"></i>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="<?= $web['wa'] ?>">
                            <div id="swhite" class="text-center">
                                <i class="fab fa-whatsapp align-bottom"></i>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="<?= $web['fb'] ?>">
                            <div id="swhite" class="text-center">
                                <i class="fab fa-facebook-f align-bottom"></i>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
            <div id="loc">
                <h4>Our Location</h4>
                <ul>
                    <li>
                        <img src="<?= base_url('assets/');?>img/icons/my_location.png" alt="loc">
                    </li>
                    <li>
                        <a href="<?= $web['location'] ?>">
                            <?= $web['location'] ?>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <?php endforeach; ?>


        <!-- Line White 2 -->
        <div class="d-none" id="ln-2"></div>
        <div class="col-sm-12 mx-auto text-center" id="copyright">
            <span>Copyright &copy; BroMind Cafe <?= date('Y'); ?></span>
        </div>
    </div>
</footer>

<script src="<?= base_url('assets/');?>js/cart_shopping.js"></script>
<!-- JAVASCRIPT ASSETS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js " integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN " crossorigin="anonymous "></script>
<script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
<script src="<?= base_url('assets/js/navbar-collapse.js') ?>"></script>
<script type="text/javascript" src="http://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit2"></script>
<script type="text/javascript" src="http://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit2"></script>

<!-- <script src = "https://unpkg.com/ cart-localstorage @ latest /dist/cart-localstorage.min.js" defer> </script> -->
<script>

    //mencari nama menu makanan 
    $(document).ready(function(){
        $("#cari").on("keyup",function(){
            let value = $(this).val().toLowerCase();
            $("#data .form-group").filter(function(){
                $(this).toggle($(this).text().toLowerCase().indexOf(value)>-1)
            });
        });
    });

    //untuk mentranslet bahasa
    function googleTranslateElementInit2(){
        new google.translate.TranslateElement(
        {
            pageLanguage:'id',
            autoDisplay:false
        },

        'google_translate_element2');
    }

    function GTranslateFireEvent(element, event){
        try{
            if(document.createEventObject){
                let evt = document.createEventObject();
                element.fireEvent('on'+event,evt)
            
            } else {
                let evt = document.createEvent('HTMLEvents');
                evt.initEvent(event,true,true);
                element.dispatchEvent(evt)
            }
        }

        catch(e){}
    }

    function doGTranslate(lang_pair){
        if(lang_pair.value)lang_pair = lang_pair.value;
        if(lang_pair == '')return;
        let lang = lang_pair.split('|')[1];
        let teCombo;
        let sel = document.getElementsByTagName('select');
        for(let i = 0; i<sel.length; i++)
            if(sel[i].className=='goog-te-combo')teCombo=sel[i];
            if(document.getElementById('google_translate_element2')==null || document.getElementById('google_translate_element2').innerHTML.length == 0 || teCombo.length == 0 || teCombo.innerHTML.length == 0){

                setTimeout(function(){doGTranslate(lang_pair)}, 500)
            } else {
                teCombo.value=lang;GTranslateFireEvent(teCombo,'change');
                GTranslateFireEvent(teCombo,'change');
            }

    }
     // $(".alert").alert().delay(3000).slideUp("slow");

     //membuat efek garis pada navbar
    // $(function tes() {
    //     $(".nav-link").addClass('border-bottom-active');
    // });

    // $(document).ready(function(){
    //     $(this).tes();
    // });

    function numberOnly(numb) {
        var numbInput = (numb.which) ? numb.which : event.keyCode
            if (numbInput > 31 && (numbInput < 48 || numbInput > 57))
                return false;
            return true;
    }
        
    $(document).ready(function() {
        $(".add_qty").click(function(){
            var position = $(this).attr('position');
            var qty = $("#qty\\["+position+"\\]").val();
            qty++;
            $("#qty\\["+position+"\\]").val(qty);
        });
        
        $(".less_qty").click(function(){
            var position = $(this).attr('position');
            var qty = $("#qty\\["+position+"\\]").val();
            qty--;
            if(qty >= 0){
                $("#qty\\["+position+"\\]").val(qty);
            }
        });

        $(".add_to_cart").click(function(){
            var product_id = $(this).attr('product_id');
            var qty = $('.qty'+product_id).val();
            var total_harga = $("#total").val();
            
            if(qty == 0){
                alert('Minumum quantity 1');
                return false;
            } else {
                $("#notification_div").html('<div class="alert alert-info" role="alert">Please wait...</div>');
                var dataString  = { product_id  : product_id , qty : qty };
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url('LandingPage');?>",
                        data: dataString,
                        dataType: "json",
                        cache       : false,
                        success: function(data){
                            $("#notification_div").html('<div class="alert alert-success" role="alert">Success add to cart...</div>');
                            $("#update_cart").html(data.update_cart);
                        } ,error: function(xhr, status, error) {
                            alert(status);
                        },
                    });
            }
            
        });
    });
</script>
</body>
</html>