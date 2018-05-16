/*添加函数*/

function addLoadEvent(func){

	var oldonload = window.onload;

	if(typeof window.onload != 'function'){

		window.onload = func;

	}else {

		window.onload = function(){

			oldonload();

			func();

		}

	}

}



/*layer-culture标签切换*/

function tabChange(){

	var tabs = document.getElementById('tabs');

	var tabso = tabs.getElementsByTagName('li');

	var con = document.getElementById('content-wrap');

	var cono = con.getElementsByTagName('div');

	for(var i = 0; i < tabso.length; i++) {

	    tabso[i].index = i;

	    tabso[i].onmouseover = function() {

	        for(var i = 0; i < tabso.length; i++) {

	            tabso[i].className = "";

	        }

	        this.className = "active";

	        for(var j = 0; j < cono.length; j++) {

	            cono[j].className = "hide";

	        }

	        cono[this.index].className = "show";

	    }   

}

}





/*控制元素显示或者隐藏*/

function toggle(which){

	if (which.style.display == "none") {

		which.style.display = "block";

	}else{

		which.style.display = "none";

	}

}



function togbac(aa){

	if (!aa.className) {

		aa.className = 'live';

	}else {

		aa.className = '';

	}

}



function showReward(){

	var more = document.getElementById("more");

	var morea = more.getElementsByTagName("a");

	var bossReward = document.getElementById("boss-reward");

	morea[0].onclick = function(){

		togbac(this);

        toggle(bossReward);

        return false;

	}

}



function showPatent(){

		var sysMore = document.getElementById("sysMore");

		var sysMorea = sysMore.getElementsByTagName("a");

		var sysShow = document.getElementById("sysShow");

		sysMorea[0].onclick = function(){

			togbac(this);

	        toggle(sysShow);

	        return false;

		}

}



/*layer-develop时间轴切换*/

function change(whichli){

	var text = whichli.getAttribute('property1')?whichli.getAttribute('property1'):'';

	var text2 = whichli.firstChild.nodeType == 3?whichli.firstChild.nodeValue:'';

	var dateDeve = document.getElementById('dateDeve');

	var dateEvent = document.getElementById('dateEvent');

	if(dateEvent.firstChild.nodeType == 3){

		dateEvent.firstChild.nodeValue = text;

	}

	if(dateDeve.firstChild.nodeType == 3){

		dateDeve.firstChild.nodeValue = text2;

	}

}

function develop(){

	var timeline = document.getElementById('timeline');

	var timelineo = timeline.getElementsByTagName('li');

	for (var i = 0; i < timelineo.length; i++) {

		/*timelineo[i].index = i;*/

		timelineo[i].onmouseover = function(){

			for (var i = 0; i < timelineo.length; i++) {

				timelineo[i].className = '';

			}

			change(this);

			this.className = 'active';

		}

	}

}



addLoadEvent(tabChange);

addLoadEvent(showReward);

addLoadEvent(showPatent);

addLoadEvent(develop);

// addLoadEvent(contact);