/*******************************************************************************
 * <pre>
 * registerSelectableSingleRow
 * registerChangeToHandCursorOnRow
 * registerRowClick
 * addIdToRow
 * </pre>
 ******************************************************************************/
(function($) {
	/* * * * * * * * * * * * * * * * * * * * * * * * *
	 * DataTables function - start
	 * * * * * * * * * * * * * * * * * * * * * * * * */
	$.fn.r9jasonDataTable = function(options) {
		var _self = this;

		var defaults = {
			delay : 400, // delay for 400ms for Server site. No effect on clien site sorting

			// set to true if assign <tr id='xxx'> from aoColumns;
			idTr : false,
			idIndex : 0, // row id, row id is index=0
			selectSingleRow : false, // set to true if select single row
			rowSelectedClass : 'row_selected',

			/*
			all valid(not disabled, checked) input(text, password, hidden, textarea, radio, checkbox)
			will send to server.
			 */
			autoSearch : false,
			searchPanelId : 'searchPanel',

			// autoFilter need to use with filterInputPrefix & filterInputPrefix.
			autoFilter : false,
			// filterInputPrefix - it needed for auto get filter input and set to aoData
			filterInputPrefix : 'search_',
			// paramPostfix - used with filterInputPrefix
			/*
			For example, input is search_username,
			so, param username2 will send to server.
			if autoFilter set to false, it not auto implement search_username to username2
			 */
			paramPostfix : "2",

			showHandOnRow : false,
			rowClick : null, // register row click event
			/*
			Deprecated replace by 'autoSearch', 'searchPanelId', 'autoFilter', 'filterInputPrefix'
			 */
			extraParams : null, // pass extra params to server
			// Deprecate, use jquery.live(), refer to live function in jquery website
			// extra function for reassignEvent when JSON is back from server
			reassignEvent : null,
            "oLanguage": {
                "sUrl": "/home/loadDatatableLanguagePack"
            },
			"fnServerData" : function(sSource, aoData, fnCallback) {
				/* Add some extra data to the sender */
				_addExtraParam(aoData);
                $.getJSON(sSource, aoData, function(json) {
                    new JsonStat(json, {
                        onSuccess : function(json) {
                            fnCallback(json);
                            /*
                            all event in detail datagrid need to reassign
                            because, every remote call, the DOM will be
                            restructure again.
                            */
                            _reassignEvent();
                        },
                        onFailure : function(json, error) {
                            messageBox.alert(error);
                        }
                    });
                });
			},

			// DataTables params
			bFilter : false,
			"sPaginationType": "full_numbers"
		};

		// Extend our default options with those provided.
		var opts = $.extend( {}, defaults, options);
		// Our plugin implementation code goes here.

		var timeout = null;

		// init the origin datatable
		this.dataTable(opts);

		_init();

		function _init() {
			var $input = $("thead input:not([component_type=datepicker])",
					_self);
			var $select = $("thead select", _self);
			var $datepicker = $("thead input[component_type=datepicker]", _self);

			// register tooltip
//			$("thead input:not([component_type=datepicker])[title!='']", _self).qtip({ style: { name: 'blue', tip: true } });
//			$("thead select[title!='']", _self).qtip({ style: { name: 'blue', tip: true } });
//			$("thead input[component_type=datepicker][title!='']", _self).qtip({ style: { name: 'blue', tip: true } });

			if (typeof opts.bServerSide == 'undefined' || opts.bServerSide == false || opts.bServerSide == 'false'){
				if(opts.idTr) {
					_addIdToRow();
				}
			}

			if (opts.bServerSide || opts.bServerSide == 'true') {
				if ($input.length) {
					$input.keyup(function(event) {
						clearTimeout(timeout);
						timeout = setTimeout(_onChangeForServer, opts.delay);
					});
				}

				if ($select.length) {
					$select.change(function(event) {
						_self.fnDraw();
					});
				}

				if ($datepicker.length) {
					$datepicker.each(function(event) {
						// distroy it
							$(this).datepicker('destroy');

							// re-create again
							$(this)
									.datepicker(
											{
												onSelect : function(dateText,
														inst) {
													if ($.trim(dateText) != '') {
														if (!validateDate(dateText)) {
															messageBox
																	.alert("The date "
																			+ dateText
																			+ " is not valid");

															inst.val('');
															return;
														}
														_self.fnDraw();
													}
												}
											});

							$(this).change(
									function(event) {
										var dateText = $(this).val();
										if ($.trim(dateText) != '') {
											if (!validateDate(dateText)) {
												messageBox.alert("The date "
														+ dateText
														+ " is not valid");

												$(this).val('');
												return;
											}
										}

										_self.fnDraw();
									});
						});
				}
			} else {
				if ($input.length) {
					$input
							.keyup(function(event) {
								var index = $(event.target).attr("forIndex");
								if (typeof index == 'undefined'
										|| index == null) {
									alert("The forIndex attribute is not set in SEARCH button");
									return;
								}

								_self.fnFilter(this.value, index);
							});
				}

				if ($select.length) {
					$select
							.change(function(event) {
								var index = $(event.target).attr("forIndex");
								if (typeof index == 'undefined'
										|| index == null) {
									alert("The forIndex attribute is not set in SEARCH button");
									return;
								}

								_self.fnFilter(this.value, index);
							});
				}

				if ($datepicker.length) {
					$datepicker.each(function(event) {
						// distroy it
							$(this).datepicker('destroy');

							// re-create again
							$(this).datepicker(
									{
										onSelect : function(dateText, inst) {
											if ($.trim(dateText) != '') {
												if (!validateDate(dateText)) {
													alert("The date "
															+ dateText
															+ " is not valid");

													inst.val('');
													return;
												}
											}

											// jquery change forIndex to forindex, so need to detect forindex first...
											var index = $(this).attr("forindex");
											if (typeof index == 'undefined'
													|| index == null) {

												// check again forIndex
												index = $(this).attr("forIndex");
												if (typeof index == 'undefined'
													|| index == null) {
													alert("The forIndex attribute is not set in SEARCH button");
													return;
												}
											}

											_self.fnFilter(dateText, index);
										}
									});

							$(this).change(
									function(event) {
										var dateText = $(this).val();
										if ($.trim(dateText) != '') {
											if (!validateDate(dateText)) {
												alert("The date " + dateText
														+ " is not valid");

												$(this).val('');
												return;
											}
										}

										// jquery change forIndex to forindex, so need to detect forindex first...
										var index = $(this).attr("forindex");
										if (typeof index == 'undefined'
												|| index == null) {

											// check again forIndex
											index = $(this).attr("forIndex");
											if (typeof index == 'undefined'
												|| index == null) {
												alert("The forIndex attribute is not set in SEARCH button");
												return;
											}
										}

										_self.fnFilter(this.value, index);
									});
						});
				}
			}
		}
		;

		function _init4reassignEvent() {
			if (opts.idTr) {
				_addIdToRow();
			}

			if (opts.selectSingleRow) {
				_registerSelectableSingleRow();
			}

			if (opts.showHandOnRow) {
				_registerChangeToHandCursorOnRow();
			}

			if (opts.rowClick != null && typeof opts.rowClick == 'function') {
				_registerRowClick();
			}
		}

		function _addExtraParam(aoData) {
			_addSearchPanelParam(aoData);
			_addFilterHeaderParam(aoData);

			// already Deprecated
			if (opts.extraParam != null) {
				opts.extraParam(aoData);
			}
		}

		function _addSearchPanelParam(aoData){
			if(opts.autoSearch == true || opts.autoSearch == 'true'){
				var arr = $(":input",jq(opts.searchPanelId)).formFieldValue();

				if(arr.length){
					for(i=0; i<arr.length; i++){
						aoData.push( { "name": arr[i][0], "value": arr[i][1] } );
					}
				}
			}
		}

		function _addFilterHeaderParam(aoData){
			if(opts.autoFilter == true || opts.autoFilter == 'true'){
				var $input = $("thead input", _self);
				var $select = $("thead select", _self);

				if($input.length>0){
					$input.each(function(intIndex){
						var id = this.id;

						var ind = id.indexOf(opts.filterInputPrefix);
						if(ind >= 0){
							var paramId = id.substring(opts.filterInputPrefix.length) + opts.paramPostfix;
							aoData.push( { "name": paramId, "value": $(this).val() } );
						}
					});
				}

				if($select.length>0){
					$select.each(function(intIndex){
						var id = this.id;

						var ind = id.indexOf(opts.filterInputPrefix);
						if(ind >= 0){
							var paramId = id.substring(opts.filterInputPrefix.length) + opts.paramPostfix;
							aoData.push( { "name": paramId, "value": $(this).val() });
						}
					});
				}
			}
		}

		function _reassignEvent() {
			_init4reassignEvent();

			if (opts.reassignEvent != null
					&& typeof opts.reassignEvent == 'function') {
				opts.reassignEvent();
			}
		}

		function _addIdToRow() {
			// get the 1st <td> for each tr in 'tableModel'
			$("tbody tr td:nth-child(1)", _self).each(function() {
				/* Get the position of the current data from the node */
				var aPos = _self.fnGetPosition(this);

				// no data found
					if (aPos == null) {
						return;
					}

					/* Get the data array for this row, aPos[0] is row num*/
					var aData = _self.fnGetData(aPos[0]);

					// alert("aPos = " + aPos);
					// alert("aData = " + aData);

					var id = aData[opts.idIndex];

					// alert(id);

					// set id to <tr>
					$(this).parent().attr("id", id);
				});

			return _self;
		}
		;

		function _registerSelectableSingleRow() {
			_self.children("tbody").click(function(event) {
				$(_self.fnSettings().aoData).each(function() {
					$(this.nTr).removeClass(opts.rowSelectedClass);
				});

				$(event.target.parentNode).addClass(opts.rowSelectedClass);
			});

			return _self;
		}
		;

		// register change mouse to 'hand' when mouse over
		function _registerChangeToHandCursorOnRow() {
			var defaults = {
				handCursorClass : 'handCursor'
			};

			// Extend our default options with those provided.
			var opts = $.extend(defaults, options);
			// Our plugin implementation code goes here.

			$(_self.fnSettings().aoData).each(function() {
				$(this.nTr).addClass(opts.handCursorClass);
			});

			return _self;
		}
		;

		function _registerRowClick() {
			$(_self.fnSettings().aoData).each(function() {
				var aData = this._aData;
				$(this.nTr).click(function(event) {
					var id = $(this).attr("id");
					opts.rowClick(event, id, aData);
				})
			});
		}

		function _onChangeForServer(){
			_self.fnDrawEx();
		}

        function JsonStat(json, options) {
	var defaults = {
		onSuccess : function(json) {
			alert("this is default success function for JsonStat. onSuccess function need to be overwrite");
		},
		onFailure : function(json) {
			_showErrorMessage();
		}
	};

	// Extend our default options with those provided.
	var opts = $.extend( {}, defaults, options);

	var _json = json;

	function _getJsonStatus() {
		if (typeof _json == 'undefined' || _json == null) {
			return 'UNDEFINED';
		}

		if (typeof _json['exception.message'] == 'string'
				&& _json['exception.message'] != '') {
			return 'ERROR';
		}

		if (typeof _json.fieldErrors == 'object'
				&& _json.fieldErrors.length) {
			return 'ERROR';
		}

		return 'SUCCESS';
	}

	function _getErrorMessage() {
		if (typeof _json == 'undefined' || _json == null) {
			return '';
		}

		if (typeof _json['exception.message'] == 'string'
				&& _json['exception.message'] != '') {
			return _json['exception.message'];
		}

		if (typeof _json.fieldErrors == 'object'
				&& _json.fieldErrors.length) {
			var s = '';

			$.each(_json.fieldErrors, function(n, value) {
				s += value.name + " - " + value.msg + "\n";
			});

			return s;
		}

		return '';
	}

	function _showErrorMessage() {
		messageBox.alert(_getErrorMessage());
	}

	this.getJsonStatus = _getJsonStatus;
	this.getErrorMessage = _getErrorMessage;
	this.showErrorMessage = _showErrorMessage;

	var stat = _getJsonStatus();
	if (stat == 'SUCCESS') {
		opts.onSuccess(_json);
	} else {
		opts.onFailure(_json, _getErrorMessage());
	}
};

		this.reassignEvent = _reassignEvent;

		return this;
	};

	// register row click event
	$.fn.registerRowClick = function(clickFunc) {
		var defaults = {
			clickEvent : function(e) {
				alert("This is default message for 'registerRowClick'");
			}
		};

		// Extend our default options with those provided.
		var opts = $.extend(defaults, clickFunc);
		// Our plugin implementation code goes here.

		var tableModel = this;

		$(tableModel.fnSettings().aoData).each(function() {
			$(this.nTr).click(function(event) {
				opts.clickEvent(event);
			})
		});

		return this;
	};

	// re-draw the grid and check User session
	$.fn.fnDrawEx = function() {
		var _self = this;
        _self.fnDraw();

		return this;
	};

	/* * * * * * * * * * * * * * * * * * * * * * * * *
	 * DataTables function - end
	 * * * * * * * * * * * * * * * * * * * * * * * * */
})(jQuery);