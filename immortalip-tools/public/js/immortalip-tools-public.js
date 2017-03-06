(function( $ ) {
	'use strict';

	$(function() {
		$( "#assets_management_slider" ).slider({
			min: 10000000,
			max: 10000000000,
			step: 10000000,
			value: 200000000,
			slide: function( event, ui ) {
				$( "#assets_management" ).val(FormatToCurrency( ui.value ) );
			}
		});
		
		$( "#assets_management" ).val( FormatToCurrency( $( "#assets_management_slider" ).slider( "value" ) ) ) ;
		
		$( '#fund_yield_slider').slider({
			min: -10,
			max: 30,
			step: 0.5,
			value: 18,
			slide: function( event, ui ) {
				$( "#fund_yield" ).val( ui.value + "%" );
			}
		});
		
		$( "#fund_yield" ).val( $( "#fund_yield_slider" ).slider( "value" ) + "%" );
		
		$( '#management_fee_slider').slider({
			min: 0,
			max: 2,
			step: 0.5,
			value: 2,
			slide: function( event, ui ) {
				$( "#management_fee" ).val( ui.value + "%" );
			}
		});
		
		$( "#management_fee" ).val( $( "#management_fee_slider" ).slider( "value" ) + "%" );
		
		$( '#performance_fee_slider').slider({
			min: 10,
			max: 30,
			step: 10,
			value: 20,
			slide: function( event, ui ) {
				$( "#performance_fee" ).val( ui.value + "%" );
			}
		});
		
		$( "#performance_fee" ).val( $( "#performance_fee_slider" ).slider( "value" ) + "%" );
		
		$( "#management_fee" ).val( $( "#management_fee_slider" ).slider( "value" ) + "%" );
		
		$( '#your_shares_slider').slider({
			min: 1,
			max: 10,
			step: 1,
			value: 1,
			slide: function( event, ui ) {
				$( "#your_shares" ).val( ui.value + "%" );
			}
		});
		
		$( "#your_shares" ).val( $( "#your_shares_slider" ).slider( "value" ) + "%" );
		
		// change event for all sliders, do calculations here
		$( ".ui-slider" ).on( "slidechange", function( event, ui ) {
			// group gross revenue
			//var finalValue = parseInt( $( "#assets_management_slider" ).slider( "value" ) ) * $( "#your_shares_slider" ).slider( "value" );
			//$('#group_gross_revenue').val( FormatToCurrency( finalValue ) );
			
			CalculateReportValues();
			
			
			/*
			 * Remove call to AJAX, could implement this later but Javascript calculations are faster
			$.ajax({ 
				url: immortal.ajaxurl,
				type : 'post',
				dataType: 'json',
				data : { action: 'get_sensitivity_valuation_values', 
							assests_management_val : assestsManagementValue,
							security: immortal.nonce },
				beforeSend : function() {
					//$.blockUI( { message: null } );
				},
				success: function(data, textStatus, jqXHR){
					console.log('complete ' + data.finalValue);
				},
				complete: function( jqXHR, textStatus ) {
					//$(document).ajaxStop($.unblockUI);
					console.log('complete');
				},
				error: function(jqXHR, textStatus, errorThrown) {
					console.log( textStatus );
				}
			});
			*/
		} );
		
		CalculateReportValues();
		
		function CalculateReportValues() {
			var ausTaxRate = 0.3;
			var recoverableBudgetPercent = 0.05;
			var traderPercent = 0.25;
			var opexPercent = 0.05;
			var performanceYieldPercent = 0.8;
			var ebitaMultiplier = 15;
			var numShares = 267;
			var totalShares = 100000;
			
			var assestsManagementVal = parseInt( $( "#assets_management_slider" ).slider( "value" ) );
			var fundYieldPercent = $( "#fund_yield_slider" ).slider( "value" ) / 100;
			var managementFeePercent = $( "#management_fee_slider" ).slider( "value" ) / 100;
			var performanceFeePercent = $( "#performance_fee_slider" ).slider( "value" ) / 100;
			var yourSharesNumPercent = $( "#your_shares_slider" ).slider( "value" );
			
			var grossYieldVal = parseInt( assestsManagementVal * fundYieldPercent );
			var opexVal = parseInt( grossYieldVal * opexPercent );
			var netYield = parseInt( grossYieldVal - opexVal );
			var capitalRevVal = parseInt( netYield * performanceYieldPercent );
			var groupRevVal = parseInt( netYield * performanceFeePercent );
			var totalNetRevVal = parseInt( groupRevVal + capitalRevVal );
			var performanceFeeVal = parseInt( netYield * performanceFeePercent );
			
			var fundYieldVal = parseInt( assestsManagementVal * fundYieldPercent );
			var opexDistRecoverBudgetVal = parseInt( fundYieldVal * recoverableBudgetPercent );
			var managementFeeRevenue = parseInt( assestsManagementVal * managementFeePercent );
			var performanceFeeRevenue = parseInt( ( fundYieldVal - opexDistRecoverBudgetVal )  * performanceFeePercent );
			var totalEnterpriseRevenue = parseInt( performanceFeeRevenue + opexDistRecoverBudgetVal +  managementFeeRevenue );
			
			var traderRenumVal = parseInt( groupRevVal * traderPercent );
			
			var totalEntRevenue = parseInt( performanceFeeVal + managementFeeRevenue + opexVal );
			var grossGroupRevenue = parseInt( totalEntRevenue - opexVal -traderRenumVal );
			var taxPayable = parseInt( ausTaxRate * grossGroupRevenue );
			var groupEbitdaRevenue = parseInt( grossGroupRevenue - taxPayable );
			var impliedEntValuation = parseInt( grossGroupRevenue * ebitaMultiplier );
			var dividentPerShare = grossGroupRevenue / totalShares;
			//var returnIev = yourSharesNumPercent * dividentPerShare;
			var returnOnInvestment =  groupEbitdaRevenue / totalShares;
			var returnIev = ( yourSharesNumPercent / 100 * totalShares ) * returnOnInvestment;
			
			$('#group_gross_revenue').val( FormatToCurrency( grossGroupRevenue ) );
			$('#group_ebitda_npat').val( FormatToCurrency( groupEbitdaRevenue ) );
			$('#implied_ent_val').val( FormatToCurrency( impliedEntValuation ) );
			$('#iev_return_on_investment').val( FormatToCurrency( returnIev.format(2) ) );
			$('#return_on_investment').val( FormatToCurrency( returnOnInvestment.format(2) ) );
		}
	});
	
	function FormatToCurrency(yourNumber) {
		//Seperates the components of the number
		var n= yourNumber.toString().split(".");
		//Comma-fies the first part
		n[0] = n[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
		//Combines the two sections
		return '$ ' + n.join(".");
	}
	
	/**
	 * Number.prototype.format(n, x)
	 * 
	 * @param integer n: length of decimal
	 * @param integer x: length of sections
	 */
	Number.prototype.format = function(n, x) {
		var re = '\\d(?=(\\d{' + (x || 3) + '})+' + (n > 0 ? '\\.' : '$') + ')';
		return this.toFixed(Math.max(0, ~~n)).replace(new RegExp(re, 'g'), '$&,');
	};

})( jQuery );
