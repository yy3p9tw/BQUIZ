<fieldset>
	<legend>會員註冊</legend>
	<form>
        <div class="ct" style="color:red">請設定您的帳號及密碼(最長12個字元)</div>
	    Step1：登入帳號<input type="text" name="acc" id="acc"><br>
	    Step2：登入密碼<input type="password" name="pw" id="pw"><br>
        Step3：再次確認密碼<input type="password" name="pw2" id="pw2"><br>
        Step4：信箱(忘記密碼時使用)<input type="text" name="email" id="email"><br>
		<input type="button" value="註冊">
        <input type="reset" value="清除">
	</form>
</fieldset>
<script>
    function reg(){
        let data={
            acc: $("#acc").val(),
            pw: $("#pw").val(),
            pw2: $("#pw2").val(),
            email: $("#email").val()
        }
        if(data.acc == "" || data.pw == "" || data.pw2 == "" || data.email == ""){
            alert("不可空白");
        }else if(data.pw != data.pw2){
            alert("密碼不一致");
        }else{
           $.get("./api/chk_acc.php", data, (res) => {
                if(parseInt(res)){
                    alert("帳號重複")
                }else{
                    $.post("./api/reg.php", data, (res) => {
                        if(parseInt(res)){
                            alert("註冊成功");
                            location.href = "?do=login";
                        }else{
                            alert("註冊失敗，請稍後再試");
                        }
                    })
                }
            })
        }
    }
</script>