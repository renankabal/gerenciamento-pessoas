function verifica(){
	senha = document.getElementById("senha").value;
	forca = 0;
	mostra = document.getElementById("mostra");
	if((senha.length >= 4) && (senha.length <= 7)){
		forca += 10;
	}else if(senha.length>7){
		forca += 25;
	}
	if(senha.match(/[a-z]+/)){
		forca += 10;
	}
	if(senha.match(/[A-Z]+/)){
		forca += 20;
	}
	if(senha.match(/d+/)){
		forca += 20;
	}
	if(senha.match(/W+/)){
		forca += 25;
	}
	return mostra_res();
}

function mostra_res(){
	if(forca < 30){
		mostra.innerHTML = '<tr><td style="background-color:#d9534f;" width="'+forca+'%"></td><td><span style="font-size:18px;margin: 5px">Fraca</span></td></tr>';
	}else if((forca >= 30) && (forca < 50)){
		mostra.innerHTML = '<tr><td style="background-color:#f0ad4e;" width="'+forca+'%"></td><td><span style="font-size:18px;margin: 5px">Média</span></td></tr>';
	}else if((forca >= 50) && (forca < 60)){
		mostra.innerHTML = '<tr><td style="background-color:#5bc0de;" width="'+forca+'%"></td><td><span style="font-size:18px;margin: 5px">Forte</span></td></tr>';
	}else if(forca > 60){
		mostra.innerHTML = '<tr><td style="background-color:#5cb85c;" width="'+forca+'%"></td><td><span style="font-size:18px;margin: 5px">Excelente</span></td></tr>';
	}
}