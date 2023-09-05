// JavaScript Document
function lof(x)
{
	location.href=x
}
function clean(){
	$("input[type='date'],input[type='text'],input[type='number'],input[type='password']").val("");
}

function login(table){
	// console.log("hello");
	let user = {};
	user.acc=$("#acc").val();
	user.pw=$("#pw").val();

	let ans = $("#ans").val();
	$.post("./api/ans.php",{ans},(res)=>{
		if(parseInt(res)!=1){
			alert("您的驗證碼有誤")
		}else{
			$.post("./api/login.php",{table,user},(res)=>{
				if(parseInt(res)==1){
					alert("登入成功")
					switch (table){
						case 'User':
							location.href='index.php';
							break;
						case 'Admin':
							location.href='backend.php';
							break;
					}
				}else{
					alert("對不起，您輸入的帳號或密碼有誤請您重新輸入")
				}
			})
		}
	})
}

function del(table,id){
	$.post("./api/del.php",{table,id},()=>{
		location.reload();
	})


}