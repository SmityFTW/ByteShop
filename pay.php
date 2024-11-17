<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Facturacion</title>

    <script
        src="https://www.paypal.com/sdk/js?client-id=AT84Zh__Z_sIeZ4IAbmOq_GecFXflwqGjXgCHwPrNhKDfK6-6scSj5mI7JDVn5QsBEwShvwcpLm9VQPN&currency=USD&components=buttons"
    ></script>


  </head>
  <body>

    <header>
        
    </header>

    <main>
        <div id="paypal-button-container"></div>
    </main>

    <!-- 
        Smith Martinez - SmityFTW 

        Diseño Web e implementacion de apis
    -->

    <script>
        paypal.Buttons({
            style:{
                color: 'blue',
                shape: 'pill',
                label: 'pay'
            },
            createOrder: function(data, actions){
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: 10
                        }
                    }]
                });
            },

            onApprove: function(data, actions){
                actions.order.capture().then(function(detalles){
                    console.log(detalles);
                    window.location.href="completado.html";
                });
            },

            onCancel: function(data){
                alert("Pago canselado!");
                console.log(data);
            }
        }).render('#paypal-button-container');
    </script>
    

  </body>
</html>
