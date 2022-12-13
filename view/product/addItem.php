<?php include "view/addHeader.php"?>
<script src="javaScript/addItem.js"></script>
<!DOCTYPE html>
<br>
<br>
<br>
<div class="container" style=" padding-bottom: 2%; padding-top: 1%;">
    <h3 style="text-align: center;color: blue;">Product Add</h3>
    <br>
    <div class="row">
        <div class="col">
            <form id="product_form" method="POST">
                <div class="input-group mb-3">
                    <table>
                        <tr>
                            <td><label>SKU</label></td>
                            <td><input name = "sku" id="sku" type="text" size="45" required onsubmit="required()" onchange="checkDuplicate()"></td>
                        </tr>
                        <tr>
                            <td><label>Name</label></td>
                            <td><input name = "name" id="name" type="text" size="45" required></td>
                        </tr>
                        <tr>
                            <td><label>Price ($)</label></td>
                            <td><input name = "price" id="price" type="text" size="45" onchange="numericCheck(this)" required></td>
                        </tr>
                        <tr>
                            <td><label>Type Switcher</label></td>
                            <td><select id="productType" name="productType" onchange="typeChange()" required>
                                <option value="">Type Switcher</option>
                                <option value="dvd">DVD</option>
                                <option value="furniture">Furniture</option>
                                <option value="book">Book</option>
                            </select></td>
                        </tr>
                    </table>
                </div>
                <div id="dvdModal" class="input-group mb-3">
                    <table>
                    <tr>
                            <td><label>Size (MB)</label></td>
                            <td><input name = "size" id="size" type="text" size="45" onchange="numericCheck(this)" required></td>
                        </tr>
                    </table>
                </div>
                <div id="furnitureModal" class="input-group mb-3">
                    <table>
                        <tr>
                            <td><label>Height (CM)</label></td>
                            <td><input name = "height" id="height" type="text" size="45" onchange="numericCheck(this)" required></td>
                        </tr>
                        <tr>
                            <td><label>Width (CM)</label></td>
                            <td><input name = "width" id="width" type="text" size="45" onchange="numericCheck(this)" required></td>
                        </tr>
                        <tr>
                            <td><label>Length (CM)</label></td>
                            <td><input name = "length" id="length" type="text" size="45" onchange="numericCheck(this)" required></td>
                        </tr>
                    </table>
                </div>
                <div id="bookModal" class="input-group mb-3">
                    <table>
                        <tr>
                            <td><label>Weight (KG)</label></td>
                            <td><input name = "weight" id="weight" type="text" size="45" onchange="numericCheck(this)" required></td>
                        </tr>
                    </table>
                </div>
            </form>
            <!-- <button type="button" onclick="save()" class="btn btn-success">Save</button> -->
        </div>
    </div>
</div>

<br>
<br>
<?php include "view/footer.php"?>
