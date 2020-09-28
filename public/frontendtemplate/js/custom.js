//localstorage JS
$(document).ready(function(){
	show_product_count();
	function show_product_count(){

		var my_cart=localStorage.getItem('my_cart');
		if (my_cart) {
			var my_cart_obj=JSON.parse(my_cart);
			var product_count=0;
            //loop the product_count
            if (my_cart_obj.product_list) {
            	$(my_cart_obj.product_list).each(function(i,v){
            		product_count+=v.quantity;

            	})
            //show product_count result in Bedge
            $(".product_count").html(product_count);
        }
      }
   }
   function add_to_cart(product){
   	// console.log(product);
   	var my_cart=localStorage.getItem('my_cart');

   	if (!my_cart) {
        //if my_cart is not in localStorage we create new
        my_cart='{"product_list":[]}';

      }

      var my_cart_obj=JSON.parse(my_cart);
      //check product id in product_list
      //if there is product id, we will increase quantity
      //if ther is no same product id, we will push new product to product list

      var has_value=false;
      $(my_cart_obj.product_list).each(function(i,v){
        //console.log(i,v);
        if(product.id==v.id){
        	v.quantity++;
        	has_value=true;
        }
      });
      if (!has_value) {
        //push one product in product list of my_cart_obj
        my_cart_obj.product_list.push(product);
      }

      //parse my_cart_obj to json string and store to localstorage
      localStorage.setItem('my_cart',JSON.stringify(my_cart_obj));
      // console.log(my_cart_obj);
   }

$(".addtocartBtn").click(function(){
	// alert('hi');
	// console.log('hi');
	var id=$(this).data('id');
	var name=$(this).data('name');
	var price=$(this).data('price');
	var photo=$(this).data('photo');
  // console.log(id,name,price,photo);
  var product={
  	id:id,
  	name:name,
  	price:price,
  	photo:photo,
  	quantity:1
  };
  add_to_cart(product);
  show_product_count();
})
$(".btn_order").click(function(){
      console.log('order');
      my_cart=localStorage.getItem('my_cart');
      $.ajax({
     method: "POST",
     url: "order_product.php",//action
     data:{my_cart:my_cart}//name & value
    }).done(function(data){
     //console.log(data);
     if (data) {
       //localStorage.clear();
       localStorage.removeItem('my_cart');
       $(".cart-container").html('<h1>Order Processed Successfully!</h1>');
     } 
   });
   
   })
    showTable();
    $(".product_list").on('click','.btn_plus',function(){
      //alert('plus');
      var id=$(this).data('id');
      console.log(id);
      change_product_quantity(1,id);
    })
    $(".product_list").on('click','.btn_minus',function(){
      //alert('minus');
      //var id=this.data('id');
      var id=$(this).data('id');
      console.log(id);
      change_product_quantity(2,id);
    })

      function showTable(){
      var my_cart=localStorage.getItem('my_cart');
      if (my_cart) {
        var my_cart_obj=JSON.parse(my_cart);
        if (my_cart_obj.product_list) {
          if (my_cart_obj.product_list.length) {
            var html='';
            var j=1;
            var total=0;
            $(my_cart_obj.product_list).each(function(i,v){
              var id=v.id;
              var name=v.name;
              var photo=v.photo;
              var price=v.price;
              var quantity=v.quantity;
              var subtotal=quantity*price;
              total+=subtotal;
              html=html+`<tr>
                            <td>${j}</td>
                            <td><img src='${photo}'  width=100 height=100></td>
                            <td>${name}</td>
                            <td>${price}</td>

                            <td><i class='fa fa-minus-circle btn_minus p-2' data-id=${id}></i>${quantity}
                                 <i class='fa fa-plus-circle btn_plus p-2' data-id=${id}></i></td>
                            <td>${subtotal}</td>
                            </tr>`;
                            j++;

            })
            html=html+`<tr><td colspan=5>Total</td><td>${total}</td></tr>`;
            $(".product_list").html(html);

          }else{
            $(".product_table_row").html('<h3>Your Cart is Empty</h3>');
            // $(".btn_order").hide();
        }
      }else{
             $(".product_table_row").html('<h3>Your Cart is Empty</h3>');
            // $(".btn_order").hide();                
        }
        }else{
           $(".product_table_row").html('<h3>Your Cart is Empty</h3>');
            // $(".btn_order").hide();              
      }
    }


    function change_product_quantity(type,id){
      var my_cart=localStorage.getItem('my_cart');
      var my_cart_obj= JSON.parse(my_cart);
      $(my_cart_obj.product_list).each(function(i,v){
        if (v.id==id) {
          if (type==1) {
            v.quantity++;
          }else{
            if (v.quantity==1) {
              var ans=confirm('Are you sure to delete?');
              if (ans) {
                 my_cart_obj.product_list.splice(i,1);
              }
             
            }else{
              v.quantity--;
            }
            //
          }
        }
      })
      localStorage.setItem('my_cart',JSON.stringify(my_cart_obj));
      showTable();
      show_product_count();
    }

    $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
    //checkout Ajax
    $('.checkoutBtn').click(function(){
      // alert('ok');
      var localStr=localStorage.getItem('my_cart');
      if(localStr){
        $.post("/checkout",{data:localStr},function(result){
          console.log(result);
        })
        localStorage.clear();
        window.location.href="/";

      }
    })
})






