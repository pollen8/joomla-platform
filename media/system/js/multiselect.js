/**
<<<<<<< HEAD
 * @version		$Id: multiselect.js 20196 2011-01-09 02:40:25Z ian $
=======
>>>>>>> upstream/master
 * @copyright	Copyright (C) 2005 - 2011 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

/**
 * JavaScript behavior to allow shift select in administrator grids
 */
(function() {
	Joomla = Joomla || {};

	Joomla.JMultiSelect = new Class({
		initialize : function(table) {
			this.table = document.id(table);
<<<<<<< HEAD
			this.boxes = table.getElements('input[type=checkbox]');
			this.boxes.addEvent('click', this.doselect.bindWithEvent(this));
		},
		doselect: function(e) {
			var current = document.id(e.target);
			if(e.shift && $type(this.last) !== false){
				var checked = current.getProperty('checked')  ? 'checked' : '';
				var range = [this.boxes.indexOf(current), this.boxes.indexOf(this.last)].sort();
				for(var i=range[0]; i <= range[1]; i++){
=======
			if (table) {
				this.boxes = table.getElements('input[type=checkbox]');
				this.boxes.addEvent('click', function(e){
					this.doselect(e);
				}.bind(this));
			}
		},

		doselect: function(e) {
			var current = document.id(e.target);
			if (e.shift && typeOf(this.last) !== 'null') {
				var checked = current.getProperty('checked') ? 'checked' : '';
				var range = [this.boxes.indexOf(current), this.boxes.indexOf(this.last)].sort(function(a, b) {
					//Shorthand to make sort() sort numerical instead of lexicographic
					return a-b;
				});
				for (var i=range[0]; i <= range[1]; i++) {
>>>>>>> upstream/master
					this.boxes[i].setProperty('checked', checked);
				}
			}
			this.last = current;
		}
	});
<<<<<<< HEAD

	window.addEvent('domready', function() {
		var adminForm = document.id('adminForm');
		if (adminForm) {
			new Joomla.JMultiSelect(adminForm);
		}
	});
=======
>>>>>>> upstream/master
})();