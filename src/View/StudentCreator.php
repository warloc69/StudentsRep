<!-- Button trigger modal -->
<button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
    Добавить студента
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Добавить студента</h4>
            </div>
            <div class="modal-body">
                <form method="post" name="sentMessage" class="form form-register1" id="contactForm" action="../controller/addStudent">
                    <div class="control-group">
                        <div class="controls">
                            <input type="text" class="form-control" onblur='if(this.value=="") this.placeholder="Имя"'
                                   onfocus='if(this.value=="Имя") this.value=""'
                                   placeholder="Имя" id="fname" name="fname" maxlength="100" />
                            <p class="help-block"></p>
                            <input type="text" class="form-control" onblur='if(this.value=="") this.placeholder="Фамилия"'
                                   onfocus='if(this.value=="Фамилия") this.value=""'
                                   placeholder="Фамилия" id="sname" name="sname" maxlength="100"/>
                            <p class="help-block"></p>
                            <label> Возраст
                                <select class="form-control" id="age" name="age" title="Возраст">
                                    <?php
                                    for($i = 16;$i<100;$i++) {
                                        echo '<option>'.$i.'</option>';
                                    }
                                    ?>
                                </select>
                            </label>
                            <p class="help-block"></p>
                            <label> Пол
                                <select class="form-control" id="male" name="male" title="Пол">
                                    <option>Мужской</option>
                                    <option>Женский</option>
                                </select>
                            </label>
                            <p class="help-block"></p>
                            <input type="text" class="form-control" onblur='if(this.value=="") this.placeholder="Группа"'
                                   onfocus='if(this.value=="Группа") this.value=""'
                                   placeholder="Группа" id="group_univer" name="group_univer"  maxlength="100"/>
                            <p class="help-block"></p>
                            <input type="text" class="form-control" onblur='if(this.value=="") this.placeholder="Факультет"'
                                   onfocus='if(this.value=="Факультет") this.value=""'
                                   placeholder="Факультет" id="faculty" name="faculty"  maxlength="100"/>
                            <p class="help-block"></p>
                        </div>
                    </div>
                    <button type="submit" id="add" class="btn btn-primary" >Сохранить</button><br />

                </form>
            </div>

        </div>
    </div>
</div>
