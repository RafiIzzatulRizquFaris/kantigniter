<script>
    let harga = 0
    let trolley = []

    function buyproduct(id, name, price, image) {
        for (let i = 0; i < trolley.length; i++) {
            if (name == trolley[i][0]) {
                trolley[i][3] += 1
                showcart()
                return
            }
        }
        let pushData = [name, Number(price), image, 1, id]
        trolley.push(pushData)
        showcart()
    }

    function showcart() {
        $('#cart-section').html("")
        trolley.forEach(data => {
            const itemLayout = `
        <div class="media mb-3">
            <img src="<?php echo base_url('assets/product/');?>${data[2]}" class="mr-3" width="100">
            <div class="media-body">
            <input type="text" readonly value="${data[4]}" class="mt-0 font-weight-bold" name="product_id[]" hidden>
            <input type="text" readonly value="${data[0]}" class="mt-0 font-weight-bold" name="product_name[]">
            <span style="float: left;" class="mt-1"><input type="number" class="quantity" value="${data[3]}" name="product_qty[]"></span>
            <input type="text" readonly value="Rp.${data[1]}" id="cart-price" class="cart-price mt-2" name="product_price[]">
            </div>    
            <button class="btn btn-sm btn-danger ml-2" id="deleteItem">x</button>
        </div>
        `
            $('#cart-section').append(itemLayout)
        })
    }

    function showprice() {
        trolley.forEach(data => {
            harga += data[1] * data[3]
            $('#heading-cart').val(harga)
        })
    }

    function clearArray() {
        while (trolley.length > 0) {
            trolley.pop()
        }
        showcart()
        $('#heading-cart').val("Cart")
    }
</script>