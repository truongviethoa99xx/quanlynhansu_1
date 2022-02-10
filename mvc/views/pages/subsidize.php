<!-- Page Header -->
<div class="page-header">
    <div class="row align-items-center">
        <div class="col">
            <h3 class="page-title"> Phụ cấp </h3>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="./Admin"> Hệ Thống </a></li>
                <li class="breadcrumb-item active"> Phụ cấp </li>
            </ul>
        </div>
        <div class="col-auto float-right ml-auto">
            <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_position"><i class="fa fa-plus"></i> Thêm </a>
        </div>
    </div>
</div>
<!-- /Page Header -->

<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <table id="my-table" class="table table-striped custom-table mb-0 datatable">
                <thead>
                    <tr>
                        <th><strong> Mã phụ cấp </strong></th>
                        <th><strong> Tiền phụ cấp </strong></th>
                    </tr>
                </thead>
                <tbody>
					<?php 
						foreach ($data['show'] as $key => $value ){
							$ma = $value['MaPhuCap'];
							$name = $value['TienPhuCap'];	
					?>
                    <tr style="counter-increment: rowNumber;">
                        <td><strong><?php echo $ma; ?></strong></td>
                        <td> <?php echo $name; ?> </td>
                    </tr>
					<?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- /Page Content -->

<!-- Add Modal -->
<div id="add_position" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> Thêm phụ cấp </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label> Mã phụ cấp </label>
                                <input id="ma" class="form-control" type="text" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label> Tiền phụ cấp </label>
                                <input id="heso" class="form-control" type="text" placeholder="1.0"/>
                            </div>
                        </div>
                    </div>
                    <div class="submit-section">
                        <button id="btn_add" class="btn btn-primary submit-btn"> Thêm </button>
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
            url: '../Subsidize/action',
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
                alert("Nhập phụ cấp");  
                return false;  
           }  
           $.ajax({  
                url:"../Subsidize/addSubsidize",  
                method:"POST",  
                data:{ma:ma, heso:heso},  
                dataType:"text",  
                success:function(data)  
                {  
                    if(data == 'true'){
                        alert("Thêm thành công");
                    } else {
                        alert("Mã hoặc phụ cấp đã tồn tại");
                    }
                }  
           })  
      });  
    }); 
</script>