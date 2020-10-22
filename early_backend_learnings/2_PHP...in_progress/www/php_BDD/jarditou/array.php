<?php
    include("assets/php/headerArray.php");    
?>

    <!-- Banner (if there are several image, use a carousel)-->
    <div class="card bg-dark text-white mt-1">
        <!-- I can link the page of the promotions in the "href" -->
        <a href="index.html"><img src="assets/img/promotion.jpg" class="card-img"
                alt="promotion sur les lames de terrasse"></a>
    </div>

    <!-- Products Array 
    TODO: complete "img => alt, title" "a=> href"-->
    <div class="table-bordered table-responsive-sm mt-3">
        <table class="table">
            <thead>
                <tr>
                    <th>Photo</th>
                    <th>ID</th>
                    <th>Barbecues</th>
                    <th>Libellé</th>
                    <th>Prix</th>
                    <th>Couleur</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><img src="assets/img/7.jpg" class="img" alt="" title=""></td>
                    <td>7</td>
                    <td>Barbecues</td>
                    <td><a href="" title="">Aramis</a></td>
                    <td>110.00 €</td>
                    <td>Brun</td>
                </tr>
                <tr>
                    <td><img src="assets/img/8.jpg" alt="" title=""></td>
                    <td>8</td>
                    <td>Barbecues</td>
                    <td><a href="" title="">Athos</a></td>
                    <td>249.99 €</td>
                    <td>Noir</td>
                </tr>
                <tr>
                    <td><img src="assets/img/11.jpg" alt="" title=""></td>
                    <td>11</td>
                    <td>Barbecues</td>
                    <td><a href="" title="">Clatronic</a></td>
                    <td>135.90 €</td>
                    <td>Chrome</td>
                </tr>
                <tr>
                    <td><img src="assets/img/12.jpg" alt="" title=""></td>
                    <td>12</td>
                    <td>Barbecues</td>
                    <td><a href="" title="">Camping</a></td>
                    <td>88.00 €</td>
                    <td>Noir</td>
                </tr>
                <tr>
                    <td><img src="assets/img/13.jpg" alt="" title=""></td>
                    <td>13</td>
                    <td>Brouettes</td>
                    <td><a href="" title="">Green</a></td>
                    <td>49.00 €</td>
                    <td>Verte</td>
                </tr>
            </tbody>
        </table>
    </div>

<?php
    include("assets/php/footer.php");    
?>