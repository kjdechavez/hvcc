/**
* Client Side Encoding Validation
*
*
* @author jem.raymundo.obimapp.com
* @default erases all inputs
*
* Validates if:
*
* Plain Validation
* AN 	- Alpha Numeric Only
* N 	- Numeric Only
* A 	- Alpha(LowerCased and UpperCased) Only
* LA	- Lowercased Alpha Only
* UA	- Uppercased Alpha Only
* S 	- Special Characters Only
* 
*
*
*/
var eVal = {

		_value : '',
		_trimmed : '',
		_type : '',	


		/**
		* process validation
		* @thisId - html element ID
		* @thisType - Type of validator
		* val -Type of rule
		*/
		process : function(thisId,thisType,rule){
			
			//variable assign
			this._value = $("#"+thisId).val();
			this._type = thisType;


			if(rule=='P')
				this.pValRules();
			else
				this.cValRules();

			this.output(thisId);
		},
		


		pValRules : function(){

			switch(this._type){

				case 'AN':
					this._trimmed = this._value.replace(/[^ 0-9 a-z A-Z]/g, '');
					break;

				case 'N':
					this._trimmed = this._value.replace(/[^ 0-9]/g, '');
					break;

				case 'AA':
					this._trimmed = this._value.replace(/[^ a-z A-Z]/g, '');
					break;

				case 'LA':
					this._trimmed = this._value.replace(/[^ a-z]/g, '');
					break;

				case 'UA':
					this._trimmed = this._value.replace(/[^ A-Z]/g, '');
					break;

				default:
					break;
					
			}
		},


		/**
		* Custom Validation
		* NM - Number Money = NumbersOnly + (".", ",")
		*
		*/
		cValRules : function(){

			if(this._type == 'NM'){

				this._trimmed = this._value.replace(/[^ 0-9 \.\ ]/g, '');

				if(this._occurence(".") > 1 || this._occurence("-") > 1) {
					this._trimmed = this._trimmed.slice(0, -1);
				}

			} //end of NM

		},


		output : function(thisId){
			$("#"+thisId).val(this._trimmed);
		},


		//count string occurence
		_occurence : function(str) {
			return this._trimmed.split(str).length-1;
		}

}; //end of object


/**
* Prototype Caller
*
*/
function evalidate(thisId,thisType,rule){
	eVal.process(thisId,thisType,rule);
}

