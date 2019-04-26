
window.onload = function () {
    var btn = document.getElementsByName('add')[0];
    btn.onclick = function () {
        document.location.replace("tasks/create");
    };
    var fas = document.getElementsByClassName('fas');
    for (var i = 0; i < fas.length; i++) {
        fas[i].onclick = function () {
            document.location.replace("tasks/edit");
            var text = document.getElementById(''+this.id+'').textContent;
            var task_text_json = JSON.stringify(text);
            localStorage.setItem('text', task_text_json);

            var text_id = this.id;
            var task_json = JSON.stringify(text_id);
            localStorage.setItem('text_id', task_json);
        };

    }
    var text_id = localStorage.getItem('text_id');
    var id_text = JSON.parse(text_id);
    id_text = + id_text;
    var text_task = localStorage.getItem('text');
    var text = JSON.parse(text_task);
    // id_text, text

    document.getElementsByName('edit_text')[0].value = text;
    document.getElementsByName('task_id')[0].value = id_text;
    
    localStorage.clear();
};

//
//document.getElementById('questions-btn').onclick = function () {
//    var xhr = new XMLHttpRequest();
//    xhr.open('GET', '/api/questions');
//    xhr.onreadystatechange = function () {
//	if (xhr.readyState === 4) {
//	    if (xhr.status === 200) {
//		var json_text = xhr.responseText;
//		var questions = JSON.parse(json_text);
//		console.log(questions);
//		//TODO вывести в таблицу
//		var tbody = document.querySelector('#questions tbody');
//		tbody.innerHTML = '';
//		for (var i = 0; i < questions.length; i++) {
//		    var tr = '<tr>\n\
//		    <td>' + (i + 1) + '</td>\n\
//		    <td>' + questions[i].name + '</td>\n\
//		    <td>' + questions[i].text + '</td>\n\
//		    </tr>';
//		    tbody.innerHTML += tr;
//		}
//	    } else {
//		return false;
//	    }
//	}
//    };
//    xhr.send();
//
//};