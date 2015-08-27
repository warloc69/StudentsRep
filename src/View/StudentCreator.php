<!-- Button trigger modal -->
<button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
    �������� ��������
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">�������� ��������</h4>
            </div>
            <div class="modal-body">
                <form method="post" name="sentMessage" class="form form-register1" id="contactForm" action="../controller/addStudent">
                    <div class="control-group">
                        <div class="controls">
                            <input type="text" class="form-control" onblur='if(this.value=="") this.placeholder="���"'
                                   onfocus='if(this.value=="���") this.value=""'
                                   placeholder="���" id="fname" name="fname" maxlength="100" />
                            <p class="help-block"></p>
                            <input type="text" class="form-control" onblur='if(this.value=="") this.placeholder="�������"'
                                   onfocus='if(this.value=="�������") this.value=""'
                                   placeholder="�������" id="sname" name="sname" maxlength="100"/>
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
                                   placeholder="������" id="group_univer" name="group_univer"  maxlength="100"/>
                            <p class="help-block"></p>
                            <input type="text" class="form-control" onblur='if(this.value=="") this.placeholder="���������"'
                                   onfocus='if(this.value=="���������") this.value=""'
                                   placeholder="���������" id="faculty" name="faculty"  maxlength="100"/>
                            <p class="help-block"></p>
                        </div>
                    </div>
                    <button type="submit" id="add" class="btn btn-primary" >���������</button><br />

                </form>
            </div>

        </div>
    </div>
</div>
