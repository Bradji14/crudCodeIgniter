<!DOCTYPE html>
<html lang="en">

<head>
    <title>CRUD|CodeIgniter</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>

    <!-- scripts for modals -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>
    <div class="container"><br /><br />
        <div class="row">

            <div class="col-lg-2">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
                    Add New Student
                </button>
            </div>

        </div>

        <?php
        // print_r($all_products);
        ?>
        <table class="table table-bordered table-striped" id="productsTable">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Name product</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                <?php
        foreach($all_products as $row):?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['name_product'] ?></td>
                    <td><?= $row['description'] ?></td>
                    <td><?= $row['price'] ?></td>
                    <td><?= $row['stock'] ?></td>
                    <td>
                        <button data-key="<?= $row['id'] ?>" class="btn btn-primary btnEdit">Edit</button>
                        <button data-key="<?= $row['id'] ?>" class="btn btn-danger btnDelete">Delete</button>
                    </td>

                </tr>
                <?php
            endforeach;?>
            </tbody>
        </table>
        <!-- modal add product -->

        <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ModalLabel">Add New Product</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="addProduct" action="<?php echo site_url('store');?>" method="post">

                        <div class="errors text-danger fs-3"></div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="txtname">Name product:</label>
                                <input type="text" class="form-control input" id="txtname"
                                    placeholder="Enter Name Product" name="txtname">
                            </div>
                            <div class="form-group">
                                <label for="txtdesc">Description:</label>
                                <input type="text" class="form-control input"
                                    id="txtdesc"placeholder="Enter Description" name="txtdesc" >
                            </div>
                            <div class="form-group">
                                <label for="txtprice">Price:</label>
                                <input type="number" class="form-control input" id="txtprice"
                                    placeholder="Enter Price" name="txtprice" >
                            </div>
                            <div class="form-group">
                                <label for="txtstock">Stock:</label>
                                <select class="form-select input" aria-label="Default select example" name="txtstock"  >
                                    <option value="">Choose a option</option>
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary addBtn">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <!-- modal Edit -->

        <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ModalLabel">Update products</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="updateProducts" action="<?php echo site_url('update');?>" method="post">

                        <div class="errors text-danger fs-3"></div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="txtname">Name product:</label>
                                <input type="hidden" id="id" name="id">
                                
                                <input type="text" class="form-control input" id="txtname"
                                    placeholder="Enter Name Product" name="txtname">
                            </div>
                            <div class="form-group">
                                <label for="txtdesc">Description:</label>
                                <input type="text" class="form-control input"
                                    id="txtdesc"placeholder="Enter Description" name="txtdesc" >
                            </div>
                            <div class="form-group">
                                <label for="txtprice">Price:</label>
                                <input type="number" class="form-control input" id="txtprice"
                                    placeholder="Enter Price" name="txtprice" >
                            </div>
                            <div class="form-group">
                                <label for="txtstock">Stock:</label>
                                <select class="form-select input" aria-label="Default select example" name="txtstock" id="stock"  >
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary updateBtn">Update data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            console.log($('.btnEdit').length)
            $('#productsTable').DataTable();

            //add new products
            $("#addProduct").validate({
                rules: {
                    txtname: "required",
                    txtdesc: "required",
                    txtprice: "required",
                    txtstock: "required",
                },
                messages: {
                },
                submitHandler: function(form) {
                    
                var form_action = $("#addProduct").attr("action");

                    $.ajax({                     
                        url: form_action,
                        type: "POST",
                        data: $('#addProduct').serialize(),
                        success: function (res) {
                            $('.addBtn').text('Charging...')

                            setTimeout(() => {
                                location.reload()
                            }, 2000);
                        },
                        error: function (data) {
                            console.log("fk");
                        }
                    })
                }
            })

            //search id and show data in all fields
            $(document).on('click', '.btnEdit', function(){

                $('#updateModal').modal('show');
                var id = $(this).data('key');

                $.ajax({
                        url:`edit/${id}`,
                        type: "get",
                        dataType: 'json',
                        success: function (res) {
                           $('#updateProducts #id').val(res.data.id)
                           $('#updateProducts #txtname').val(res.data.name_product)
                           $('#updateProducts #txtdesc').val(res.data.description)
                           $('#updateProducts #txtprice').val(res.data.price)
                           $('#updateProducts #stock').val(res.data.stock)
                        }
                })
                
            });

            //update registers
            $("#updateProducts").validate({
                rules: {
                    txtname: "required",
                    txtdesc: "required",
                    txtprice: "required",
                },
                
             //action for update registers

                submitHandler: function(form) {
                    // console.log($('#updateProducts').serialize());
                    var form_action = $("#updateProducts").attr("action");
                   
                    $.ajax({                     
                        url: form_action,
                        type: "POST",
                        data: $('#updateProducts').serialize(),
                        success: function (res) {

                            $('.updateBtn').text('Updating...')
                           
                                setTimeout(() => {
                                    location.reload();
                                }, 2000);
                        },
                        error: function (data) {
                            console.log("Error data");
                        }
                    })
                }
            })

            //delete products
            $('body').on('click', '.btnDelete', function () {
                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                    }).then((result) => {
                    if (result.isConfirmed) {
                        var id_product = $(this).data('key');
                        $.get('delete/'+id_product, function (data) {
                            Swal.fire({
                            title: "Deleted!",
                            text: "Your product has been deleted.",
                            icon: "success"
                            });
                           setTimeout(() => {
                            location.reload();
                           }, 2000);
                        })                        
                    }
                    });
            })
           
        })
    </script>
