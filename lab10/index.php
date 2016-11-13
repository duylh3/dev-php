<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>PHP - MySQL - Ajax</title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Show all Cars</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-10">
                    <div class="pull-right">
                        <button class="btn btn-success" data-toggle="modal" data-target="#add_new_car_modal">Create Car</button>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-10">
                    <div class="records_content"></div>
                </div>
            </div>
        </div>
        <!-- Modal - Add New -->
        <div class="modal fade" id="add_new_car_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Create Car</h4>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="id">Id</label>
                            <input type="text" id="id" placeholder="Id" class="form-control"/>
                        </div>

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" id="name" placeholder="Name" class="form-control"/>
                        </div>

                        <div class="form-group">
                            <label for="year">Year</label>
                            <input type="text" id="year" placeholder="Year" class="form-control"/>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary" onclick="add()">Create</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- // Modal -->
        <!-- Modal - Update Car details -->
        <div class="modal fade" id="update_car_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Update</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="update_id">Id</label>
                            <input type="text" id="update_id" placeholder="Id" class="form-control"/>
                        </div>

                        <div class="form-group">
                            <label for="update_name">Name</label>
                            <input type="text" id="update_name" placeholder="Name" class="form-control"/>
                        </div>

                        <div class="form-group">
                            <label for="update_year">Year</label>
                            <input type="text" id="update_year" placeholder="Year" class="form-control"/>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary" onclick="update()" >Save Changes</button>
                        <input type="hidden" id="hidden_id">
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/ajax.js"></script>
    </body>
</html>
