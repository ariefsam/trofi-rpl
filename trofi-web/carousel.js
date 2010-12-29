stepcarousel.setup({
	galleryid: 'mygallery', //id of carousel DIV
	beltclass: 'contenthol', //class of inner "belt" DIV containing all the panel DIVs
	panelclass: 'con', //class of panel DIVs each holding content
	autostep: {enable:true, moveby:1, pause:3000},
	panelbehavior: {speed:500, wraparound:false, persist:true},
	defaultbuttons: {enable: true, moveby: 1, leftnav: ['images/blank.gif', -5, 80], rightnav: ['images/rightarrow.png', -20, 100]},
	statusvars: ['statusA', 'statusB', 'statusC'], //register 3 variables that contain current panel (start), current panel (last), and total panels
	contenttype: ['inline'] //content setting ['inline'] or ['external', 'path_to_external_file']
})