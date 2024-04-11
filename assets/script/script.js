//fonction pour convertir les données en objet JSON
function convertJson(data) {
	return JSON.parse(data.replace(/&quot;/g, '"'));
}
//fonction pour construire un graphique
function createChart(json) {
	//création des tableaux pour les labels et les scores
	const labels = [];
	const scores = [];
	//remplissage des tableaux
	json.forEach((row) => {
		labels.push(row.team);
		scores.push(row.score);
	});
	//création du graphique
	const graphique = new Chartist.Bar(
		".ct-chart",
		{
			labels: labels,
			series: scores,
		},
		{
			distributeSeries: true,
			axisY: {
				onlyInteger: true,
			},
		}
	).on("draw", function (data) {
		if (data.type === "bar") {
			data.element.attr({
				style: "stroke-width: 3%",
			});
		}
	});
}
