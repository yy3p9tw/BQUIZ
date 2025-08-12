<h2 class="ct">會員註冊</h2>
<!-- table.all>tr*6>td.tt.ct+td.pp>input:text -->
<table class="all">
    <tr>
        <td class="tt ct">姓名</td>
        <td class="pp"><input type="text" name="name" id="name"></td>
    </tr>
    <tr>
        <td class="tt ct">帳號</td>
        <td class="pp">
            <input type="text" name="acc" id="acc">
            <button onclick='chkAcc()'>檢測帳號</button>
        </td>
    </tr>
    <tr>
        <td class="tt ct">密碼</td>
        <td class="pp"><input type="password" name="pw" id="pw"></td>
    </tr>
    <tr>
        <td class="tt ct">電話</td>
        <td class="pp"><input type="text" name="tel" id="tel"></td>
    </tr>
    <tr>
        <td class="tt ct">住址</td>
        <td class="pp"><input type="text" name="addr" id="addr"></td>
    </tr>
    <tr>
        <td class="tt ct">電子信箱</td>
        <td class="pp"><input type="text" name="email" id="email"></td>
    </tr>
</table>
<div class="ct">
    <button onclick="reg()">註冊</button>
    <button onclick="clean()">重置</button>
</div>
<script>
function chkAcc(){
    let acc=$("#acc").val();
    $.get("./api/chkAcc.php",{acc},(res)=>{
        if(parseInt(res)>0 || acc=='admin'){
            alert("帳號已存在");
        }else{
            alert("帳號可用");
        }
    })
}


function reg(){
    let user={
        name:$("#name").val(),
        acc:$("#acc").val(),
        pw:$("#pw").val(),
        tel:$("#tel").val(),
        addr:$("#addr").val(),
        email:$("#email").val()
    };


    $.get("./api/chkAcc.php",{acc:user.acc},(res)=>{
        if(parseInt(res)>0 || acc=='admin'){
            alert("帳號已存在");
        }else{
            $.post("./api/reg.php",user,()=>{
                alert("註冊成功");
                location.href="?do=login";
            })
        }
    })

}

function clean(){
    console.log("HI")
    $("#name").val('');
    $("#acc").val('');
    $("#pw").val('');
    $("#tel").val('');
    $("#addr").val('');
    $("#email").val('');
}

</script>