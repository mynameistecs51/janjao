/**
 * @author Clément Désiles <main@jokester.fr>
 * @date 2015-03-11
 * @description A JSON speaking HTTP request handler
 * @example
 *     // Instanciate new request with callback
 *     var req = new JSONHttpRequest(function (err, data) {
 *         console.log(err, data);
 *     });
 *
 *     // Open and send request
 *     req.open('GET', '/api/users');
 *     req.send(null);
 */
(function (global) {
	'use strict';

	/**
	 * @class JSONHttpRequest
	 * @param {Function} callback - takes(String err, Object data)
	 * @return instance of JSONHttpRequest
	 */
	var JSONHttpRequest = function (callback) {
		callback = callback || function () {};

		// Prepare request
		this.xhr = new XMLHttpRequest();
		
		// Request handlers
		this.xhr.onerror = function onerror(evt) {
			return callback({ code: 'server is unreachable' });
		};
		this.xhr.onload = function onload(evt) {
			var response;
			try {
				response = JSON.parse(this.response);
			} catch (e) {
				response = {
					code: 'invalid json',
					message: this.response
				};
			} finally {
				if (this.status !== 200) {
					return callback(response);
				} else {
					return callback(null, response);
				}
			}
		};
	}

	/**
	 * Open the HTTP request and attache a JSON content-type
	 * @param {String} method - like 'GET', 'POST'..
	 * @param {String} url - like '/api/users'
	 * @return none
	 */
	JSONHttpRequest.prototype.open = function() {
		this.xhr.open.apply(this.xhr, arguments);
		this.xhr.setRequestHeader('Content-Type', 'application/json');
	}

	/**
	 * Send the HTTP request to the server
	 * @param {Object} data - optional object to send to service
	 * @return none
	 */
	JSONHttpRequest.prototype.send = function() {
		this.xhr.send.apply(this.xhr, arguments);
	}

	// Export
	global.JSONHttpRequest = JSONHttpRequest;
}) (window);
