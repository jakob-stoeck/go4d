//  Prototip 2.0.5 - 28-10-2008
//  Copyright (c) 2008 Nick Stakenburg (http://www.nickstakenburg.com)
//
//  Licensed under a Creative Commons Attribution-Noncommercial-No Derivative Works 3.0 Unported License
//  http://creativecommons.org/licenses/by-nc-nd/3.0/

//  More information on this project:
//  http://www.nickstakenburg.com/projects/prototip2/

var Prototip = {
  Version: '2.0.5'
};

var Tips = {
  options: {
    images: '../img/prototip/', // image path, can be relative to this file or an absolute url
    zIndex: 6000                   // raise if required
  }
};

Prototip.Styles = {
  // The default style every other style will inherit from.
  // Used when no style is set through the options on a tooltip.
  'default': {
    border: 6,
    borderColor: '#c7c7c7',
    className: 'default',
    closeButton: false,
    hideAfter: false,
    hideOn: 'mouseleave',
    hook: false,
	//images: 'styles/creamy/',    // Example: different images. An absolute url or relative to the images url defined above.
    radius: 6,
	showOn: 'mousemove',
    stem: {
      position: 'topLeft',       // Example: optional default stem position, this will also enable the stem
      height: 12,
      width: 15
    }
  },

  'protoblue': {
    className: 'protoblue',
    border: 6,
    borderColor: '#116497',
    radius: 6,
    stem: { height: 12, width: 15 }
  },

  'darkgrey': {
    className: 'darkgrey',
    border: 6,
    borderColor: '#363636',
    radius: 6,
    stem: { height: 12, width: 15 }
  },

  'creamy': {
    className: 'creamy',
    border: 6,
    borderColor: '#ebe4b4',
    radius: 6,
    stem: { height: 12, width: 15 }
  },

  'protogrey': {
    className: 'protogrey',
    border: 6,
    borderColor: '#606060',
    radius: 6,
    stem: { height: 12, width: 15 }
  },
  
  'mmtg': {
    className: 'protogrey',
    border: 6,
    borderColor: '#606060',
    radius: 6,
	hideOthers: true,
	hideAfter: 0.15,
	showOn: 'click',
	hideOn: 'click',
	width: '312px',
	offset: {x: 20, y:-75}
  }
  
};
Object.extend(Prototip, {
	REQUIRED_Prototype : "1.6.0.3",
	start : function() {
		this.require("Prototype");
		if (/^(https?:\/\/|\/)/.test(Tips.options.images)) {
			Tips.images = Tips.options.images
		} else {
			var A = /prototip(?:-[\w\d.]+)?\.js(.*)/;
			Tips.images = (($$("head script[src]").find(function(B) {
						return B.src.match(A)
					}) || {}).src || "").replace(A, "") + Tips.options.images
		}
		if (Prototype.Browser.IE && !document.namespaces.v) {
			document.namespaces.add("v", "urn:schemas-microsoft-com:vml");
			document.observe("dom:loaded", function() {
						document.createStyleSheet().addRule("v\\:*",
								"behavior: url(#default#VML);")
					})
		}
		Tips.initialize();
		Element.observe(window, "unload", this.unload)
	},
	require : function(A) {
		if ((typeof window[A] == "undefined")
				|| (this.convertVersionString(window[A].Version) < this
						.convertVersionString(this["REQUIRED_" + A]))) {
			throw ("Prototip requires " + A + " >= " + this["REQUIRED_" + A]);
		}
	},
	convertVersionString : function(A) {
		var B = A.replace(/_.*|\./g, "");
		B = parseInt(B + "0".times(4 - B.length));
		return A.indexOf("_") > -1 ? B - 1 : B
	},
	_captureTroubleElements : $w("input textarea"),
	capture : function(A) {
		if (Prototype.Browser.IE) {
			return A
		}
		A = A.wrap(function(E, D) {
			var B = Object.isElement(this) ? this : this.element, C = D.relatedTarget;
			while (C && C != B) {
				try {
					C = C.parentNode
				} catch (F) {
					C = B
				}
			}
			if (C == B) {
				return
			}
			E(D)
		});
		return A
	},
	toggleInt : function(A) {
		return (A > 0) ? (-1 * A) : (A).abs()
	},
	unload : function() {
		Tips.removeAll()
	}
});
Object.extend(Tips, {
	tips : [],
	visible : [],
	initialize : function() {
		this.zIndexTop = this.zIndex
	},
	useEvent : (function(A) {
		return {
			mouseover : (A ? "mouseenter" : "mouseover"),
			mouseout : (A ? "mouseleave" : "mouseout"),
			mouseenter : (A ? "mouseenter" : "mouseover"),
			mouseleave : (A ? "mouseleave" : "mouseout")
		}
	})(Prototype.Browser.IE),
	specialEvent : {
		mouseover : "mouseover",
		mouseout : "mouseout",
		mouseenter : "mouseover",
		mouseleave : "mouseout"
	},
	_inverse : {
		left : "right",
		right : "left",
		top : "bottom",
		bottom : "top",
		middle : "middle",
		horizontal : "vertical",
		vertical : "horizontal"
	},
	_stemTranslation : {
		width : "horizontal",
		height : "vertical"
	},
	inverseStem : function(A) {
		return !!arguments[1] ? this._inverse[A] : A
	},
	fixIE : (function(B) {
		var A = new RegExp("MSIE ([\\d.]+)").exec(B);
		return A ? (parseFloat(A[1]) < 7) : false
	})(navigator.userAgent),
	WebKit419 : (Prototype.Browser.WebKit && !document.evaluate),
	add : function(A) {
		this.tips.push(A)
	},
	remove : function(A) {
		var B = this.tips.find(function(C) {
					return C.element == $(A)
				});
		if (B) {
			B.deactivate();
			if (B.tooltip) {
				B.wrapper.remove();
				if (Tips.fixIE) {
					B.iframeShim.remove()
				}
			}
			this.tips = this.tips.without(B)
		}
		A.prototip = null
	},
	removeAll : function() {
		this.tips.each(function(A) {
					this.remove(A.element)
				}.bind(this))
	},
	raise : function(C) {
		if (C == this._highest) {
			return
		}
		if (this.visible.length === 0) {
			this.zIndexTop = this.options.zIndex;
			for (var B = 0, A = this.tips.length; B < A; B++) {
				this.tips[B].wrapper.setStyle({
							zIndex : this.options.zIndex
						})
			}
		}
		C.wrapper.setStyle({
					zIndex : this.zIndexTop++
				});
		if (C.loader) {
			C.loader.setStyle({
						zIndex : this.zIndexTop
					})
		}
		this._highest = C
	},
	addVisibile : function(A) {
		this.removeVisible(A);
		this.visible.push(A)
	},
	removeVisible : function(A) {
		this.visible = this.visible.without(A)
	},
	hideAll : function() {
		Tips.visible.invoke("hide")
	},
	hook : function(B, F) {
		B = $(B), F = $(F);
		var K = Object.extend({
					offset : {
						x : 0,
						y : 0
					},
					position : false
				}, arguments[2] || {});
		var D = K.mouse || F.cumulativeOffset();
		D.left += K.offset.x;
		D.top += K.offset.y;
		var C = K.mouse ? [0, 0] : F.cumulativeScrollOffset(), A = document.viewport
				.getScrollOffsets(), G = K.mouse ? "mouseHook" : "target";
		D.left += (-1 * (C[0] - A[0]));
		D.top += (-1 * (C[1] - A[1]));
		if (K.mouse) {
			var E = [0, 0];
			E.width = 0;
			E.height = 0
		}
		var I = {
			element : B.getDimensions()
		}, J = {
			element : Object.clone(D)
		};
		I[G] = K.mouse ? E : F.getDimensions();
		J[G] = Object.clone(D);
		for (var H in J) {
			switch (K[H]) {
				case "topRight" :
				case "rightTop" :
					J[H].left += I[H].width;
					break;
				case "topMiddle" :
					J[H].left += (I[H].width / 2);
					break;
				case "rightMiddle" :
					J[H].left += I[H].width;
					J[H].top += (I[H].height / 2);
					break;
				case "bottomLeft" :
				case "leftBottom" :
					J[H].top += I[H].height;
					break;
				case "bottomRight" :
				case "rightBottom" :
					J[H].left += I[H].width;
					J[H].top += I[H].height;
					break;
				case "bottomMiddle" :
					J[H].left += (I[H].width / 2);
					J[H].top += I[H].height;
					break;
				case "leftMiddle" :
					J[H].top += (I[H].height / 2);
					break
			}
		}
		D.left += -1 * (J.element.left - J[G].left);
		D.top += -1 * (J.element.top - J[G].top);
		if (K.position) {
			B.setStyle({
						left : D.left + "px",
						top : D.top + "px"
					})
		}
		return D
	}
});
Tips.initialize();
var Tip = Class.create({
	initialize : function(C, E) {
		this.element = $(C);
		if (!this.element) {
			throw ("Prototip: Element not available, cannot create a tooltip.");
			return
		}
		Tips.remove(this.element);
		var A = (Object.isString(E) || Object.isElement(E)), B = A
				? arguments[2] || []
				: E;
		this.content = A ? E : null;
		if (B.style) {
			B = Object.extend(Object.clone(Prototip.Styles[B.style]), B)
		}
		this.options = Object.extend(Object.extend({
							ajax : false,
							border : 0,
							borderColor : "#000000",
							radius : 0,
							className : Tips.options.className,
							closeButton : Tips.options.closeButtons,
							delay : !(B.showOn && B.showOn == "click")
									? 0.14
									: false,
							hideAfter : false,
							hideOn : "mouseleave",
							hideOthers : false,
							hook : B.hook,
							offset : B.hook ? {
								x : 0,
								y : 0
							} : {
								x : 16,
								y : 16
							},
							fixed : (B.hook && !B.hook.mouse) ? true : false,
							showOn : "mousemove",
							stem : false,
							style : "default",
							target : this.element,
							title : false,
							viewport : (B.hook && !B.hook.mouse) ? false : true,
							width : false
						}, Prototip.Styles["default"]), B);
		this.target = $(this.options.target);
		this.radius = this.options.radius;
		this.border = (this.radius > this.options.border)
				? this.radius
				: this.options.border;
		if (this.options.images) {
			this.images = this.options.images.include("://")
					? this.options.images
					: Tips.images + this.options.images
		} else {
			this.images = Tips.images + "styles/" + (this.options.style || "")
					+ "/"
		}
		if (!this.images.endsWith("/")) {
			this.images += "/"
		}
		if (Object.isString(this.options.stem)) {
			this.options.stem = {
				position : this.options.stem
			}
		}
		if (this.options.stem.position) {
			this.options.stem = Object.extend(Object
							.clone(Prototip.Styles[this.options.style].stem)
							|| {}, this.options.stem);
			this.options.stem.position = [
					this.options.stem.position.match(/[a-z]+/)[0].toLowerCase(),
					this.options.stem.position.match(/[A-Z][a-z]+/)[0]
							.toLowerCase()];
			this.options.stem.orientation = ["left", "right"]
					.member(this.options.stem.position[0])
					? "horizontal"
					: "vertical";
			this.stemInverse = {
				horizontal : false,
				vertical : false
			}
		}
		if (this.options.ajax) {
			this.options.ajax.options = Object.extend({
						onComplete : Prototype.emptyFunction
					}, this.options.ajax.options || {})
		}
		this.useEvent = $w("area input").member(this.element.tagName
				.toLowerCase()) ? Tips.specialEvent : Tips.useEvent;
		if (this.options.hook.mouse) {
			var D = this.options.hook.tip.match(/[a-z]+/)[0].toLowerCase();
			this.mouseHook = Tips._inverse[D]
					+ Tips._inverse[this.options.hook.tip.match(/[A-Z][a-z]+/)[0]
							.toLowerCase()].capitalize()
		}
		this.fixSafari2 = (Tips.WebKit419 && this.radius);
		this.setup();
		Tips.add(this);
		this.activate();
		Prototip.extend(this)
	},
	setup : function() {
		this.wrapper = new Element("div", {
					className : "prototip"
				}).setStyle({
					zIndex : Tips.options.zIndex
				});
		if (this.fixSafari2) {
			this.wrapper.hide = function() {
				this.setStyle("left:-9500px;top:-9500px;visibility:hidden;");
				return this
			};
			this.wrapper.show = function() {
				this.setStyle("visibility:visible");
				return this
			};
			this.wrapper.visible = function() {
				return (this.getStyle("visibility") == "visible" && parseFloat(this
						.getStyle("top").replace("px", "")) > -9500)
			}
		}
		this.wrapper.hide();
		if (Tips.fixIE) {
			this.iframeShim = new Element("iframe", {
						className : "iframeShim",
						src : "javascript:false;",
						frameBorder : 0
					}).setStyle({
						display : "none",
						zIndex : Tips.options.zIndex - 1,
						opacity : 0
					})
		}
		if (this.options.ajax) {
			this.showDelayed = this.showDelayed.wrap(this.ajaxShow)
		}
		this.tip = new Element("div", {
					className : "content"
				});
		this.title = new Element("div", {
					className : "title"
				}).hide();
		if (this.options.closeButton
				|| (this.options.hideOn.element && this.options.hideOn.element == "closeButton")) {
			this.closeButton = new Element("div", {
						className : "close"
					}).setPngBackground(this.images + "close.png")
		}
	},
	build : function() {
		if (document.loaded) {
			this._build();
			this._isBuilding = true;
			return true
		} else {
			if (!this._isBuilding) {
				document.observe("dom:loaded", this._build);
				return false
			}
		}
	},
	_build : function() {
		$(document.body).insert(this.wrapper);
		if (Tips.fixIE) {
			$(document.body).insert(this.iframeShim)
		}
		if (this.options.ajax) {
			$(document.body).insert(this.loader = new Element("div", {
						className : "prototipLoader"
					}).setPngBackground(this.images + "loader.gif").hide())
		}
		var G = "wrapper";
		if (this.options.stem.position) {
			this.stem = new Element("div", {
						className : "prototip_Stem"
					}).setStyle({
				height : this.options.stem[this.options.stem.orientation == "vertical"
						? "height"
						: "width"]
						+ "px"
			});
			var B = this.options.stem.orientation == "horizontal";
			this[G].insert(this.stemWrapper = new Element("div", {
						className : "prototip_StemWrapper clearfix"
					}).insert(this.stemBox = new Element("div", {
						className : "prototip_StemBox clearfix"
					})));
			this.stem.insert(this.stemImage = new Element("div", {
						className : "prototip_StemImage"
					}).setStyle({
						height : this.options.stem[B ? "width" : "height"]
								+ "px",
						width : this.options.stem[B ? "height" : "width"]
								+ "px"
					}));
			if (Tips.fixIE
					&& !this.options.stem.position[1].toUpperCase()
							.include("MIDDLE")) {
				this.stemImage.setStyle({
							display : "inline"
						})
			}
			G = "stemBox"
		}
		if (this.border) {
			var D = this.border, F;
			this[G].insert(this.borderFrame = new Element("ul", {
						className : "borderFrame"
					})
					.insert(this.borderTop = new Element("li", {
								className : "borderTop borderRow"
							}).setStyle("height: " + D + "px")
							.insert(new Element("div", {
								className : "prototip_CornerWrapper prototip_CornerWrapperTopLeft"
							}).insert(new Element("div", {
										className : "prototip_Corner"
									}))).insert(F = new Element("div", {
										className : "prototip_BetweenCorners"
									}).setStyle({
										height : D + "px"
									}).insert(new Element("div", {
										className : "prototip_Between"
									}).setStyle({
										margin : "0 " + D + "px",
										height : D + "px"
									}))).insert(new Element("div", {
								className : "prototip_CornerWrapper prototip_CornerWrapperTopRight"
							}).insert(new Element("div", {
										className : "prototip_Corner"
									}))))
					.insert(this.borderMiddle = new Element("li", {
								className : "borderMiddle borderRow"
							}).insert(this.borderCenter = new Element("div", {
								className : "borderCenter"
							}).setStyle("padding: 0 " + D + "px")))
					.insert(this.borderBottom = new Element("li", {
								className : "borderBottom borderRow"
							})
							.setStyle("height: " + D + "px")
							.insert(new Element("div", {
								className : "prototip_CornerWrapper prototip_CornerWrapperBottomLeft"
							}).insert(new Element("div", {
										className : "prototip_Corner"
									}))).insert(F.cloneNode(true))
							.insert(new Element("div", {
								className : "prototip_CornerWrapper prototip_CornerWrapperBottomRight"
							}).insert(new Element("div", {
										className : "prototip_Corner"
									})))));
			G = "borderCenter";
			var C = this.borderFrame.select(".prototip_Corner");
			$w("tl tr bl br").each(function(I, H) {
						if (this.radius > 0) {
							Prototip.createCorner(C[H], I, {
										backgroundColor : this.options.borderColor,
										border : D,
										radius : this.options.radius
									})
						} else {
							C[H].addClassName("prototip_Fill")
						}
						C[H].setStyle({
									width : D + "px",
									height : D + "px"
								}).addClassName("prototip_Corner"
								+ I.capitalize())
					}.bind(this));
			this.borderFrame.select(".prototip_Between", ".borderMiddle",
					".prototip_Fill").invoke("setStyle", {
						backgroundColor : this.options.borderColor
					})
		}
		this[G].insert(this.tooltip = new Element("div", {
					className : "tooltip " + this.options.className
				}).insert(this.toolbar = new Element("div", {
					className : "toolbar"
				}).insert(this.title)));
		if (this.options.width) {
			var E = this.options.width;
			if (Object.isNumber(E)) {
				E += "px"
			}
			this.tooltip.setStyle("width:" + E)
		}
		if (this.stem) {
			var A = {};
			A[this.options.stem.orientation == "horizontal" ? "top" : "bottom"] = this.stem;
			this.wrapper.insert(A);
			this.positionStem()
		}
		this.tooltip.insert(this.tip);
		if (!this.options.ajax) {
			this._update({
						title : this.options.title,
						content : this.content
					})
		}
	},
	_update : function(E) {
		var A = this.wrapper.getStyle("visibility");
		this.wrapper.setStyle("height:auto;width:auto;visibility:hidden")
				.show();
		if (this.border) {
			this.borderTop.setStyle("height:0");
			this.borderTop.setStyle("height:0")
		}
		if (E.title) {
			this.title.show().update(E.title);
			this.toolbar.show()
		} else {
			if (!this.closeButton) {
				this.title.hide();
				this.toolbar.hide()
			}
		}
		if (Object.isElement(E.content)) {
			E.content.show()
		}
		if (Object.isString(E.content) || Object.isElement(E.content)) {
			this.tip.update(E.content)
		}
		this.tooltip.setStyle({
					width : this.tooltip.getWidth() + "px"
				});
		this.wrapper.setStyle("visibility:visible").show();
		this.tooltip.show();
		var C = this.tooltip.getDimensions(), B = {
			width : C.width + "px"
		}, D = [this.wrapper];
		if (Tips.fixIE) {
			D.push(this.iframeShim)
		}
		if (this.closeButton) {
			this.title.show().insert({
						top : this.closeButton
					});
			this.toolbar.show()
		}
		if (E.title || this.closeButton) {
			this.toolbar.setStyle("width: 100%")
		}
		B.height = null;
		this.wrapper.setStyle({
					visibility : A
				});
		this.tip.addClassName("clearfix");
		if (E.title || this.closeButton) {
			this.title.addClassName("clearfix")
		}
		if (this.border) {
			this.borderTop.setStyle("height:" + this.border + "px");
			this.borderTop.setStyle("height:" + this.border + "px");
			B = "width: " + (C.width + 2 * this.border) + "px";
			D.push(this.borderFrame)
		}
		D.invoke("setStyle", B);
		if (this.stem) {
			this.positionStem();
			if (this.options.stem.orientation == "horizontal") {
				this.wrapper.setStyle({
							width : this.wrapper.getWidth()
									+ this.options.stem.height + "px"
						})
			}
		}
		this.wrapper.hide()
	},
	activate : function() {
		this.eventShow = this.showDelayed.bindAsEventListener(this);
		this.eventHide = this.hide.bindAsEventListener(this);
		if (this.options.fixed && this.options.showOn == "mousemove") {
			this.options.showOn = "mouseover"
		}
		if (this.options.showOn == this.options.hideOn) {
			this.eventToggle = this.toggle.bindAsEventListener(this);
			this.element.observe(this.options.showOn, this.eventToggle)
		}
		if (this.closeButton) {
			this.closeButton.observe("mouseover", function(E) {
						E.setPngBackground(this.images + "close_hover.png")
					}.bind(this, this.closeButton)).observe("mouseout",
					function(E) {
						E.setPngBackground(this.images + "close.png")
					}.bind(this, this.closeButton))
		}
		var C = {
			element : this.eventToggle ? [] : [this.element],
			target : this.eventToggle ? [] : [this.target],
			tip : this.eventToggle ? [] : [this.wrapper],
			closeButton : [],
			none : []
		}, A = this.options.hideOn.element;
		this.hideElement = A || (!this.options.hideOn ? "none" : "element");
		this.hideTargets = C[this.hideElement];
		if (!this.hideTargets && A && Object.isString(A)) {
			this.hideTargets = this.tip.select(A)
		}
		var D = {
			mouseenter : "mouseover",
			mouseleave : "mouseout"
		};
		$w("show hide").each(function(H) {
			var G = H.capitalize(), F = (this.options[H + "On"].event || this.options[H
					+ "On"]);
			this[H + "Action"] = F;
			if (["mouseenter", "mouseleave", "mouseover", "mouseout"]
					.include(F)) {
				this[H + "Action"] = (this.useEvent[F] || F);
				this["event" + G] = Prototip.capture(this["event" + G])
			}
		}.bind(this));
		if (!this.eventToggle) {
			this.element.observe(this.options.showOn, this.eventShow)
		}
		if (this.hideTargets) {
			this.hideTargets.invoke("observe", this.hideAction, this.eventHide)
		}
		if (!this.options.fixed && this.options.showOn == "click") {
			this.eventPosition = this.position.bindAsEventListener(this);
			this.element.observe("mousemove", this.eventPosition)
		}
		this.buttonEvent = this.hide.wrap(function(G, F) {
					var E = F.findElement(".close");
					if (E) {
						E.blur();
						F.stop();
						G(F)
					}
				}).bindAsEventListener(this);
		if (this.closeButton
				|| (this.options.hideOn && (this.options.hideOn.element == ".close"))) {
			this.wrapper.observe("click", this.buttonEvent)
		}
		if (this.options.showOn != "click" && (this.hideElement != "element")) {
			this.eventCheckDelay = Prototip.capture(function() {
						this.clearTimer("show")
					}).bindAsEventListener(this);
			this.element.observe(this.useEvent.mouseout, this.eventCheckDelay)
		}
		var B = [this.element, this.wrapper];
		this.activityEnter = Prototip.capture(function() {
					Tips.raise(this);
					this.cancelHideAfter()
				}).bindAsEventListener(this);
		this.activityLeave = Prototip.capture(this.hideAfter)
				.bindAsEventListener(this);
		B.invoke("observe", this.useEvent.mouseover, this.activityEnter)
				.invoke("observe", this.useEvent.mouseout, this.activityLeave);
		if (this.options.ajax && this.options.showOn != "click") {
			this.ajaxHideEvent = Prototip.capture(this.ajaxHide)
					.bindAsEventListener(this);
			this.element.observe(this.useEvent.mouseout, this.ajaxHideEvent)
		}
	},
	deactivate : function() {
		if (this.options.showOn == this.options.hideOn) {
			this.element.stopObserving(this.options.showOn, this.eventToggle)
		} else {
			this.element.stopObserving(this.options.showOn, this.eventShow);
			if (this.hideTargets) {
				this.hideTargets.invoke("stopObserving")
			}
		}
		if (this.eventPosition) {
			this.element.stopObserving("mousemove", this.eventPosition)
		}
		if (this.eventCheckDelay) {
			this.element.stopObserving("mouseout", this.eventCheckDelay)
		}
		this.wrapper.stopObserving();
		this.element.stopObserving(this.useEvent.mouseover, this.activityEnter)
				.stopObserving(this.useEvent.mouseout, this.activityLeave);
		if (this.ajaxHideEvent) {
			this.element.stopObserving(this.useEvent.mouseout,
					this.ajaxHideEvent)
		}
	},
	ajaxShow : function(C, B) {
		if (!this.tooltip) {
			if (!this.build()) {
				return
			}
		}
		this.position(B);
		if (this.ajaxContentLoading) {
			return
		} else {
			if (this.ajaxContentLoaded) {
				C(B);
				return
			}
		}
		this.ajaxContentLoading = true;
		var D = {
			fakePointer : {
				pointerX : Event.pointerX(B),
				pointerY : Event.pointerY(B)
			}
		};
		var A = Object.clone(this.options.ajax.options);
		A.onComplete = A.onComplete.wrap(function(F, E) {
					this._update({
								title : this.options.title,
								content : E.responseText
							});
					this.position(D);
					(function() {
						F(E);
						var G = (this.loader && this.loader.visible());
						if (this.loader) {
							this.clearTimer("loader");
							this.loader.remove();
							this.loader = null
						}
						if (G) {
							this.show()
						}
						this.ajaxContentLoaded = true;
						this.ajaxContentLoading = null
					}.bind(this)).delay(0.6)
				}.bind(this));
		this.loaderTimer = Element.show.delay(this.options.delay, this.loader);
		this.wrapper.hide();
		this.ajaxContentLoading = true;
		this.loader.show();
		this.ajaxTimer = (function() {
			new Ajax.Request(this.options.ajax.url, A)
		}.bind(this)).delay(this.options.delay);
		return false
	},
	ajaxHide : function() {
		this.clearTimer("loader")
	},
	showDelayed : function(A) {
		if (!this.tooltip) {
			if (!this.build()) {
				return
			}
		}
		this.position(A);
		if (this.wrapper.visible()) {
			return
		}
		this.clearTimer("show");
		this.showTimer = this.show.bind(this).delay(this.options.delay)
	},
	clearTimer : function(A) {
		if (this[A + "Timer"]) {
			clearTimeout(this[A + "Timer"])
		}
	},
	show : function() {
		if (this.wrapper.visible()) {
			return
		}
		if (Tips.fixIE) {
			this.iframeShim.show()
		}
		if (this.options.hideOthers) {
			Tips.hideAll()
		}
		Tips.addVisibile(this);
		this.tooltip.show();
		this.wrapper.show();
		if (this.stem) {
			this.stem.show()
		}
		this.element.fire("prototip:shown")
	},
	hideAfter : function(A) {
		if (this.options.ajax) {
			if (this.loader && this.options.showOn != "click") {
				this.loader.hide()
			}
		}
		if (!this.options.hideAfter) {
			return
		}
		this.cancelHideAfter();
		this.hideAfterTimer = this.hide.bind(this)
				.delay(this.options.hideAfter)
	},
	cancelHideAfter : function() {
		if (this.options.hideAfter) {
			this.clearTimer("hideAfter")
		}
	},
	hide : function() {
		this.clearTimer("show");
		this.clearTimer("loader");
		if (!this.wrapper.visible()) {
			return
		}
		this.afterHide()
	},
	afterHide : function() {
		if (Tips.fixIE) {
			this.iframeShim.hide()
		}
		if (this.loader) {
			this.loader.hide()
		}
		this.wrapper.hide();
		(this.borderFrame || this.tooltip).show();
		Tips.removeVisible(this);
		this.element.fire("prototip:hidden")
	},
	toggle : function(A) {
		if (this.wrapper && this.wrapper.visible()) {
			this.hide(A)
		} else {
			this.showDelayed(A)
		}
	},
	positionStem : function() {
		var C = this.options.stem, B = arguments[0] || this.stemInverse, D = Tips
				.inverseStem(C.position[0], B[C.orientation]), F = Tips
				.inverseStem(C.position[1], B[Tips._inverse[C.orientation]]), A = this.radius
				|| 0;
		this.stemImage.setPngBackground(this.images + D + F + ".png");
		if (C.orientation == "horizontal") {
			var E = (D == "left") ? C.height : 0;
			this.stemWrapper.setStyle("left: " + E + "px;");
			this.stemImage.setStyle({
						"float" : D
					});
			this.stem.setStyle({
						left : 0,
						top : (F == "bottom" ? "100%" : F == "middle"
								? "50%"
								: 0),
						marginTop : (F == "bottom"
								? -1 * C.width
								: F == "middle" ? -0.5 * C.width : 0)
								+ (F == "bottom" ? -1 * A : F == "top" ? A : 0)
								+ "px"
					})
		} else {
			this.stemWrapper.setStyle(D == "top" ? "margin: 0; padding: "
					+ C.height + "px 0 0 0;" : "padding: 0; margin: 0 0 "
					+ C.height + "px 0;");
			this.stem.setStyle(D == "top"
					? "top: 0; bottom: auto;"
					: "top: auto; bottom: 0;");
			this.stemImage.setStyle({
						margin : 0,
						"float" : F != "middle" ? F : "none"
					});
			if (F == "middle") {
				this.stemImage.setStyle("margin: 0 auto;")
			} else {
				this.stemImage.setStyle("margin-" + F + ": " + A + "px;")
			}
			if (Tips.WebKit419) {
				if (D == "bottom") {
					this.stem.setStyle({
								position : "relative",
								clear : "both",
								top : "auto",
								bottom : "auto",
								"float" : "left",
								width : "100%",
								margin : (-1 * C.height) + "px 0 0 0"
							});
					this.stem.style.display = "block"
				} else {
					this.stem.setStyle({
								position : "absolute",
								"float" : "none",
								margin : 0
							})
				}
			}
		}
		this.stemInverse = B
	},
	position : function(B) {
		if (!this.tooltip) {
			if (!this.build()) {
				return
			}
		}
		Tips.raise(this);
		if (Tips.fixIE) {
			var A = this.wrapper.getDimensions();
			if (!this.iframeShimDimensions
					|| this.iframeShimDimensions.height != A.height
					|| this.iframeShimDimensions.width != A.width) {
				this.iframeShim.setStyle({
							width : A.width + "px",
							height : A.height + "px"
						})
			}
			this.iframeShimDimensions = A
		}
		if (this.options.hook) {
			var J, H;
			if (this.mouseHook) {
				var K = document.viewport.getScrollOffsets(), C = B.fakePointer
						|| {};
				var G, I = 2;
				switch (this.mouseHook.toUpperCase()) {
					case "LEFTTOP" :
					case "TOPLEFT" :
						G = {
							x : 0 - I,
							y : 0 - I
						};
						break;
					case "TOPMIDDLE" :
						G = {
							x : 0,
							y : 0 - I
						};
						break;
					case "TOPRIGHT" :
					case "RIGHTTOP" :
						G = {
							x : I,
							y : 0 - I
						};
						break;
					case "RIGHTMIDDLE" :
						G = {
							x : I,
							y : 0
						};
						break;
					case "RIGHTBOTTOM" :
					case "BOTTOMRIGHT" :
						G = {
							x : I,
							y : I
						};
						break;
					case "BOTTOMMIDDLE" :
						G = {
							x : 0,
							y : I
						};
						break;
					case "BOTTOMLEFT" :
					case "LEFTBOTTOM" :
						G = {
							x : 0 - I,
							y : I
						};
						break;
					case "LEFTMIDDLE" :
						G = {
							x : 0 - I,
							y : 0
						};
						break
				}
				G.x += this.options.offset.x;
				G.y += this.options.offset.y;
				J = Object.extend({
							offset : G
						}, {
							element : this.options.hook.tip,
							mouseHook : this.mouseHook,
							mouse : {
								top : C.pointerY || Event.pointerY(B) - K.top,
								left : C.pointerX || Event.pointerX(B) - K.left
							}
						});
				H = Tips.hook(this.wrapper, this.target, J);
				if (this.options.viewport) {
					var M = this.getPositionWithinViewport(H), L = M.stemInverse;
					H = M.position;
					H.left += L.vertical
							? 2
									* Prototip.toggleInt(G.x
											- this.options.offset.x)
							: 0;
					H.top += L.vertical
							? 2
									* Prototip.toggleInt(G.y
											- this.options.offset.y)
							: 0;
					if (this.stem
							&& (this.stemInverse.horizontal != L.horizontal || this.stemInverse.vertical != L.vertical)) {
						this.positionStem(L)
					}
				}
				H = {
					left : H.left + "px",
					top : H.top + "px"
				};
				this.wrapper.setStyle(H)
			} else {
				J = Object.extend({
							offset : this.options.offset
						}, {
							element : this.options.hook.tip,
							target : this.options.hook.target
						});
				H = Tips.hook(this.wrapper, this.target, Object.extend({
									position : true
								}, J));
				H = {
					left : H.left + "px",
					top : H.top + "px"
				}
			}
			if (this.loader) {
				var E = Tips.hook(this.loader, this.target, Object.extend({
									position : true
								}, J))
			}
			if (Tips.fixIE) {
				this.iframeShim.setStyle(H)
			}
		} else {
			var F = this.target.cumulativeOffset(), C = B.fakePointer || {}, H = {
				left : ((this.options.fixed) ? F[0] : C.pointerX
						|| Event.pointerX(B))
						+ this.options.offset.x,
				top : ((this.options.fixed) ? F[1] : C.pointerY
						|| Event.pointerY(B))
						+ this.options.offset.y
			};
			if (!this.options.fixed && this.element !== this.target) {
				var D = this.element.cumulativeOffset();
				H.left += -1 * (D[0] - F[0]);
				H.top += -1 * (D[1] - F[1])
			}
			if (!this.options.fixed && this.options.viewport) {
				var M = this.getPositionWithinViewport(H), L = M.stemInverse;
				H = M.position;
				if (this.stem
						&& (this.stemInverse.horizontal != L.horizontal || this.stemInverse.vertical != L.vertical)) {
					this.positionStem(L)
				}
			}
			H = {
				left : H.left + "px",
				top : H.top + "px"
			};
			this.wrapper.setStyle(H);
			if (this.loader) {
				this.loader.setStyle(H)
			}
			if (Tips.fixIE) {
				this.iframeShim.setStyle(H)
			}
		}
	},
	getPositionWithinViewport : function(C) {
		var E = {
			horizontal : false,
			vertical : false
		}, D = this.wrapper.getDimensions(), B = document.viewport
				.getScrollOffsets(), A = document.viewport.getDimensions(), G = {
			left : "width",
			top : "height"
		};
		for (var F in G) {
			if ((C[F] + D[G[F]] - B[F]) > A[G[F]]) {
				C[F] = C[F]
						- (D[G[F]] + (2 * this.options.offset[F == "left"
								? "x"
								: "y"]));
				if (this.stem) {
					E[Tips._stemTranslation[G[F]]] = true
				}
			}
		}
		return {
			position : C,
			stemInverse : E
		}
	}
});
Object.extend(Prototip, {
	createCorner : function(G, H) {
		var F = arguments[2] || this.options, B = F.radius, E = F.border, D = new Element(
				"canvas", {
					className : "cornerCanvas" + H.capitalize(),
					width : E + "px",
					height : E + "px"
				}), A = {
			top : (H.charAt(0) == "t"),
			left : (H.charAt(1) == "l")
		};
		if (D && D.getContext && D.getContext("2d")) {
			G.insert(D);
			var C = D.getContext("2d");
			C.fillStyle = F.backgroundColor;
			C.arc((A.left ? B : E - B), (A.top ? B : E - B), B, 0, Math.PI * 2,
					true);
			C.fill();
			C.fillRect((A.left ? B : 0), 0, E - B, E);
			C.fillRect(0, (A.top ? B : 0), E, E - B)
		} else {
			G.insert(new Element("div").setStyle({
						width : E + "px",
						height : E + "px",
						margin : 0,
						padding : 0,
						display : "block",
						position : "relative",
						overflow : "hidden"
					}).insert(new Element("v:roundrect", {
						fillcolor : F.backgroundColor,
						strokeWeight : "1px",
						strokeColor : F.backgroundColor,
						arcSize : (B / E * 0.5).toFixed(2)
					}).setStyle({
						width : 2 * E - 1 + "px",
						height : 2 * E - 1 + "px",
						position : "absolute",
						left : (A.left ? 0 : (-1 * E)) + "px",
						top : (A.top ? 0 : (-1 * E)) + "px"
					})))
		}
	}
});
Element.addMethods({
			setPngBackground : function(C, B) {
				C = $(C);
				var A = Object.extend({
							align : "top left",
							repeat : "no-repeat",
							sizingMethod : "scale",
							backgroundColor : ""
						}, arguments[2] || {});
				C.setStyle(Tips.fixIE ? {
					filter : "progid:DXImageTransform.Microsoft.AlphaImageLoader(src='"
							+ B + "'', sizingMethod='" + A.sizingMethod + "')"
				}
						: {
							background : A.backgroundColor + " url(" + B + ") "
									+ A.align + " " + A.repeat
						});
				return C
			}
		});
Prototip.Methods = {
	show : function() {
		Tips.raise(this);
		this.cancelHideAfter();
		var D = {};
		if (this.options.hook) {
			D.fakePointer = {
				pointerX : 0,
				pointerY : 0
			}
		} else {
			var A = this.target.cumulativeOffset(), C = this.target
					.cumulativeScrollOffset(), B = document.viewport
					.getScrollOffsets();
			A.left += (-1 * (C[0] - B[0]));
			A.top += (-1 * (C[1] - B[1]));
			D.fakePointer = {
				pointerX : A.left,
				pointerY : A.top
			}
		}
		if (this.options.ajax) {
			this.ajaxShow(D)
		} else {
			this.showDelayed(D)
		}
		this.hideAfter()
	}
};
Prototip.extend = function(A) {
	A.element.prototip = {};
	Object.extend(A.element.prototip, {
				show : Prototip.Methods.show.bind(A),
				hide : A.hide.bind(A),
				remove : Tips.remove.bind(Tips, A.element)
			})
};
Prototip.start();