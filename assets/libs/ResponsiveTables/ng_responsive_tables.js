;(function($){$.fn.ngResponsiveTables=function(){return this.each(function(){var dataContent='',$this=$(this),init=function(){targetTable();},targetTable=function(){$this.find('tr').each(function(){$(this).find('td').each(function(i,v){checkForTableHead($(this),i);$(this).addClass('tdno'+i);});});},checkForTableHead=function(element,index){if($this.find('th').length){dataContent=$this.find('th')[index].textContent;}else{dataContent=$this.find('tr:first td')[index].textContent;}
element.wrapInner('<div class="td-text"></div>').attr('data-content',dataContent);};init();});};}(jQuery));