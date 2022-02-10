<!-- Page Header -->
<div class="page-header">
    <div class="row align-items-center">
        <div class="col">
            <h3 class="page-title"> Hệ số lương </h3>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="./Admin"> Hệ Thống </a></li>
                <li class="breadcrumb-item active"> hệ số lương </li>
            </ul>
        </div>
        <div class="col-auto float-right ml-auto">
            <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_position"><i class="fa fa-plus"></i> Thêm </a>
        </div>
    </div>
</div>
<!-- /Page Header -->

<!-- Table Wage -->
<table class="table table-striped custom-table mb-0 datatable" id="my-table">
    <thead>
        <tr>
            <th>Mã hệ số lương</th>
            <th>Hệ số lương</th>
        </tr>
    </thead>
    <tbody>
    <?php
        foreach ($data['show'] as $key => $row){  
    ?>
        <tr>
            <td><?php echo $row['maHSL']; ?></td>
            <td><?php echo $row['HeSoLuong']; ?></td>
        </tr>
        <?php } ?>
    </tbody>
</table>
<!-- /Table Wage -->

<!-- Add Modal -->
<div id="add_position" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Thêm hệ số lương</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label> Mã hệ số lương </label>
                                <input id="ma" class="form-control" type="text" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label> Hệ số lương </label>
                                <input id="heso" class="form-control" type="text" placeholder="1.0" />
                            </div>
                        </div>
                    </div>
                    <div class="submit-section">
                        <button name="btn_add" id="btn_add" class="btn btn-primary submit-btn">Thêm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /Add Modal -->

<script >
    $(document).ready(function() {
        $('#my-table').Tabledit({
            url: '../Wage/action',
            columns: {
                identifier: [0, 'id'],
                editable: [
                    [1, 'col1'],
                ]
            },
            onSuccess(data, textStatus, jqXHR){
                console.log(data.action);
                if (data.action == 'delete') {
                    $('#' + data.id).remove();
                }
            }
        });

        $(document).on('click', '#btn_add', function(){  
           var ma = $('#ma').val();  
           var heso = $('#heso').val();  
           if(ma== '')  
           {  
                alert("Nhập mã");  
                return false;  
           }  
           if(heso == '')  
           {  
                alert("Nhập hệ số");  
                return false;  
           }  
           $.ajax({  
                url:"../Wage/addWage",  
                method:"POST",  
                data:{ma:ma, heso:heso},  
                dataType:"text",  
                success:function(data)  
                {  
                    if(data == 'true'){
                        alert("Thêm thành công");
                    } else {
                        alert("Mã hoặc hệ số lương đã tồn tại");
                    }
                }  
           })  
      });  
    }); 
</script>