//document.getElementById('courses').onclick = function () {
//    var xhr = new XMLHttpRequest();
//    xhr.open('GET', 'https://api.privatbank.ua/p24api/pubinfo?json&exchange&coursid=5');
//    xhr.onreadystatechange = function () {
//	if (xhr.readyState === 4) {
//	    if (xhr.status === 200) {
//		var json_text = xhr.responseText;
//		var courses = JSON.parse(json_text);
//		for (var i = 0; i < courses.lenth; i++) {
//		    alert(courses[i].ccy);
//		}
//
//
//	    }
//	}
//    };
//    xhr.send();
//
//};



function showQuestions() {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', '/api/questions');
    xhr.onreadystatechange = function () {
	if (xhr.readyState === 4) {
	    if (xhr.status === 200) {
		var json_text = xhr.responseText;
		var questions = JSON.parse(json_text);
		console.log(questions);
		//TODO вывести в таблицу
		var tbody = document.querySelector('#questions tbody');
		tbody.innerHTML = '';
		for (var i = 0; i < questions.length; i++) {
		    var tr = '<tr>\n\
		    <td>' + (i + 1) + '</td>\n\
		    <td>' + questions[i].name + '</td>\n\
		    <td>' + questions[i].text + '</td>\n\
		    <td>' + '<i class="fas fa-trash" id="' + questions[i].id + '"></i></td></tr>';

		    tbody.innerHTML += tr;

		}
		var tt = document.getElementsByClassName('fas');
		for (var i = 0; i < tt.length; i++) {
		    tt[i].onclick = function () {
			var id_question = this.id;
			sendIdQuestion(id_question);


		    };
		}
	    } else {
		return false;
	    }
	}
    };
    xhr.send();

}
;
showQuestions();

function sendQuestion(author, text) {
    var post_data = 'author=' + author + '&text=' + text;
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '/api/addquestion');
    xhr.onreadystatechange = function () {
	if (xhr.readyState === 4) {
	    if (xhr.status === 200) {
		showQuestions();
	    }
	}
    };
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.send(post_data);
}

document.forms.question.onsubmit = function (event) {
    var form_elements = this.elements;
    var author = form_elements.author.value;
//    form_elements.author.value='';
    var text = form_elements.text.value;
//    form.elements.text.value=''
    this.reset();

    sendQuestion(author, text);
    event.preventDefault();

};





function sendIdQuestion(id) {
    id = +id;
    var post_data = 'id=' + id;
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '/api/addquestionid');
    xhr.onreadystatechange = function () {
	if (xhr.readyState === 4) {
	    if (xhr.status === 200) {
		showQuestions();
	    }
	}
    };
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.send(post_data);
}



