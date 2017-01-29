/* Set log level*/
var name = "extensions.storyfinder-eval@lt.informatik.tu-darmstadt.de.sdk.console.logLevel";
require("sdk/preferences/service").set(name, 'info');

var self = require('sdk/self')
	, prefs = require('sdk/simple-prefs').prefs
	, tabs = require("sdk/tabs")
	, Request = require("sdk/request").Request
	;
	
function Evaluation(){
	function log(msg){
		var server = prefs['server'];
		
		var url = server + '/cmd?t=log';
		
		msg = '[firefox] ' + msg;
				
		Request({
			url: url,
			content: 'data=' + encodeURIComponent(msg) + '&id=' + encodeURIComponent(prefs['user']),
			onComplete: function (response) {
				console.log(response.text, response.status, response.statusText);
			}
		}).post();
	}
		
	tabs.on('activate', function () {
		log('Activating tab ' + tabs.activeTab.url);
	});
	
	tabs.on('open', function (tab) {	
		log('Opening tab ' + tab.url);
	});
	
	tabs.on('closed', function(tab) {
		log('Closed ' + tab.url);
	});
	
	tabs.on('load', function(tab) {
		log('Load ' + tab.url);
	});
	
	tabs.on('ready', function(tab) {
		log('Ready ' + tab.url);
	});
	
	tabs.on('pageshow', function(tab){
		log('Pageshow ' + tab.url);
	});
	
	tabs.on('deactivate', function(tab){
		log('Deactivate ' + tab.url);
	});
}

new Evaluation();