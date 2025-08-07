    <div class="modal fade" id="studentModal" tabindex="-1" aria-labelledby="studentModalLabel">
      <div class="modal-dialog modal-dialog-centered ">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="studentModalLabel">編輯學生資料</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form class="px-3">
              <div class="row g-3 mb-1">
                <label for="uni_id" class="col-sm-4 col-form-label">學號</label>
                <div class="col-sm-8">
                  <input type="number" class="form-control" value="" id="uni_id" name="uni_id" placeholder="輸入學號" />
                </div>
              </div>

              <div class="row g-3 mb-1">
                <label for="name" class="col-sm-4 col-form-label">姓名</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="name" name="name" placeholder="輸入姓名" />
                </div>
              </div>

              <div class="row g-3 mb-1">
                <label for="national_id" class="col-sm-4 col-form-label">身分證字號</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="national_id" name="national_id" placeholder="輸入身分證字號" />
                </div>
              </div>

              <div class="row g-3 mb-1">
                <label for="birthday" class="col-sm-4 col-form-label">生日</label>
                <div class="col-sm-8">
                  <input type="date" class="form-control" id="birthday" name="birthday" />
                </div>
              </div>

              <div class="row g-3 mb-1">
                <label for="classroom" class="col-sm-4 col-form-label">教室</label>
                <div class="col-sm-8">
                  <select class="form-control" id="classroom" name="classroom"></select>
                </div>
              </div>

              <div class="row g-3 mb-1">
                <label for="seat_num" class="col-sm-4 col-form-label">座號</label>
                <div class="col-sm-8">
                  <input type="number" class="form-control" id="seat_num" name="seat_num" placeholder="輸入座號" />
                </div>
              </div>

              <div class="row g-3 mb-1">
                <label for="major" class="col-sm-4 col-form-label">主修科目</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="major" name="major" placeholder="輸入主修科目" />
                </div>
              </div>

              <div class="row g-3 mb-1">
                <label for="secondary" class="col-sm-4 col-form-label">畢業國中</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="secondary" name="secondary" placeholder="輸入畢業國中" />
                </div>
              </div>

              <div class="row g-3 mb-1">
                <label for="parent" class="col-sm-4 col-form-label">家長姓名</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="parent" name="parent" placeholder="輸入家長姓名" />
                </div>
              </div>

              <div class="row g-3 mb-1">
                <label for="telphone" class="col-sm-4 col-form-label">電話</label>
                <div class="col-sm-8">
                  <input type="tel" class="form-control" id="telphone" name="telphone" placeholder="輸入電話號碼" />
                </div>
              </div>

              <div class="row g-3 mb-1">
                <label for="address" class="col-sm-4 col-form-label">地址</label>
                <div class="col-sm-8">
                  <textarea class="form-control" id="address" name="address" rows="2" placeholder="輸入地址"></textarea>
                </div>
              </div>
            </form>
          </div>

          <div class="modal-footer">
            <input type="hidden" name="id" id="id" value="<?=$_GET['id'];?>">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
              取消
            </button>
            <button type="button" class="btn btn-primary" onclick="edit()">
              送出
            </button>
          </div>
        </div>
      </div>
    </div>

<script>


function classroomMenu(classroom){
    $.get("./api/classrooms.php",function(classrooms){
        console.log(classrooms);
        classrooms.forEach(item=>{
            let selected=(item.classroom == classroom)?'selected':'';
            $("#classroom").append(`<option value="${item.classroom}" ${selected}>${item.name}</option>`);
        })
    })
}
function getStudent(id){
    $.get("./api/get_student.php",{id},function(student){
        console.log(student)
        $("#uni_id").val(student.uni_id);
        $("#name").val(student.name);
        $("#national_id").val(student.national_id);
        $("#birthday").val(student.birthday);
        $("#seat_num").val(student.seat_num);
        $("#major").val(student.major);
        $("#secondary").val(student.secondary);
        $("#parent").val(student.parent);
        $("#telphone").val(student.telphone);
        $("#address").val(student.address);
        $("#id").val(student.id); // 將學生的 id 存入隱藏欄位
        classroomMenu(student.classroom); // 呼叫函式載入班級選項
    })
}


function edit(){

    let data = {
        uni_id: $("#uni_id").val(),
        name: $("#name").val(),
        national_id: $("#national_id").val(),
        birthday: $("#birthday").val(),
        classroom: $("#classroom").val(),
        seat_num: $("#seat_num").val(),
        major: $("#major").val(),
        secondary: $("#secondary").val(),
        parent: $("#parent").val(),
        telphone: $("#telphone").val(),
        address: $("#address").val(),
        id: $("#id").val() // 從隱藏欄位取得學生的 id
    };
    
    $.post("./api/save_student.php", data, function(res){

        console.log('已送出',res);
        if (res.success) {
            alert("修改成功");
            location.href = "index.html"; // 返回主頁
        } else {
            alert("修改失敗：" + res.message);
        }
    });
}
</script>