<!-- 
Online HTML, CSS and JavaScript editor to run code online.
-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <title>Browser</title>
</head>

<body>
    <button onclick="addToCart('item1', 10, 2)">Add to Cart</button>
    <button onclick="addToCart('item2', 5, 3)">Add to Cart</button>
    <button onclick="displayCart()">Display Cart</button>
    <div id="cart"></div>

    <script>
        const cart = [];

        function addToCart(name, quantity, price) {
            const item = {
                name: name,
                quantity: quantity,
                price: price,
                total: quantity * price
            };
            cart.push(item);
            displayCart();
        }

        function removeFromCart(index) {
            cart.splice(index, 1);
            displayCart();
        }

        function editQuantity(index, quantity) {
            cart[index].quantity = quantity;
            cart[index].total = cart[index].quantity * cart[index].price;
            displayCart();
        }

        function displayCart() {
            const groupByName = cart.reduce((acc, item) => {
                if (!acc[item.name]) {
                    acc[item.name] = item;
                } else {
                    acc[item.name].quantity += item.quantity;
                    acc[item.name].total += item.total;
                }
                return acc;
            }, {});

            let output = '';
            for (const name in groupByName) {
                const item = groupByName[name];
                output += `
      <li>
        ${item.name} (${item.quantity}) $${item.total}
        <button onclick="removeFromCart('${name}')">Remove</button>
        <button onclick="editQuantity('${name}', prompt('Enter new quantity:'))">Edit</button>
      </li>
    `;
            }
            document.getElementById('cart').innerHTML = output;
        }
    </script>
</body>

</html>