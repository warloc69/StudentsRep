<?php
$student = new \src\Model\Student(\framework\db::connect());
$st = $student->find($r->data)[0];
?>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="editStudent" aria-hidden="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="false">&times;</button>
                <h4 class="modal-title" id="myModalLabel">�������� ������ ��������</h4>
            </div>
            <div class="modal-body">
                <form method="post" name="sentMessage" class="form form-register1" id="contactForm" action="../controller/editStudent">
                    <div class="control-group">
                        <div class="controls">
                            <input type="text" class="form-control" onblur='if(this.value=="") this.placeholder="���"'
                                   onfocus='if(this.value=="���") this.value=""'
                                   placeholder="���" id="fname" name="fname" maxlength="100" value="<?php echo $st->fname?>" />
                            <p class="help-block"></p>
                            <input type="text" class="form-control" onblur='if(this.value=="") this.placeholder="�������"'
                                   onfocus='if(this.value=="�������") this.value=""'
                                   placeholder="�������" id="sname" name="sname" maxlength="100" value="<?php echo $st->sname?>"/>
                            <p class="help-block"></p>
                            <label> �������
                                <select class="form-control" id="age" name="age" title="�������">
                                    <?php
                                    for($i = 16;$i<100;$i++) {
                                        echo '<option>'.$i.'</option>';
                                    }
                                    ?>
                                </select>
                            </label>
                            <p class="help-block"></p>
                            <label> ���
                                <select class="form-control" id="male" name="male" title="���">
                                    <option>�������</option>
                                    <option>�������</option>
                                </select>
                            </label>
                            <p class="help-block"></p>
                            <input type="text" class="form-control" onblur='if(this.value=="") this.placeholder="������"'
                                   onfocus='if(this.value=="������") this.value=""'
                                   placeholder="������" id="group_univer" name="group_univer" maxlength="100" value="<?php echo $st->group_univer?>"/>
                            <p class="help-block"></p>
                            <input type="text" class="form-control" onblur='if(this.value=="") this.placeholder="���������"'
                                   onfocus='if(this.value=="���������") this.value=""'
                                   placeholder="���������" id="faculty" name="faculty" maxlength="100" value="<?php echo $st->faculty?>" />
                            <p class="help-block"></p>
                            <input type="hidden" value="<?php echo $st->id?>" name="id"/>
                        </div>
                    </div>
                    <button type="submit" id="add" class="btn btn-primary" >���������</button><br />

                </form>
            </div>

        </div>
    </div>
</div>
<script> $('#myModal').modal('show')</script>
