"use strict";

// Class definition
var KTWizard4 = function () {
	// Base elements
	var _wizardEl;
	var _formEl;
	var _wizardObj;
	var _validations = [];

	// Private functions
	var _initWizard = function () {
		// Initialize form wizard
		_wizardObj = new KTWizard(_wizardEl, {
			startStep: 1, // initial active step number
			clickableSteps: false  // allow step clicking
		});

		// Validation before going to next page
		_wizardObj.on('change', function (wizard) {
			if (wizard.getStep() > wizard.getNewStep()) {
				return; // Skip if stepped back
			}

			// Validate form before change wizard step
			var validator = _validations[wizard.getStep() - 1]; // get validator for currnt step

			if (validator) {
				validator.validate().then(function (status) {
					if (status == 'Valid') {
						wizard.goTo(wizard.getNewStep());

						KTUtil.scrollTop();
					} else {
						Swal.fire({
							text: "Sorry, looks like there are some errors detected, please try again.",
							icon: "error",
							buttonsStyling: false,
							confirmButtonText: "Ok, got it!",
							customClass: {
								confirmButton: "btn font-weight-bold btn-light"
							}
						}).then(function () {
							KTUtil.scrollTop();
						});
					}
				});
			}

			return false;  // Do not change wizard step, further action will be handled by he validator
		});

		// Change event
		_wizardObj.on('changed', function (wizard) {
			KTUtil.scrollTop();
		});

		// Submit event
		_wizardObj.on('submit', function (wizard) {
			Swal.fire({
				text: "All is good! Please confirm the form submission.",
				icon: "success",
				showCancelButton: true,
				buttonsStyling: false,
				confirmButtonText: "Yes, submit!",
				cancelButtonText: "No, cancel",
				customClass: {
					confirmButton: "btn font-weight-bold btn-primary",
					cancelButton: "btn font-weight-bold btn-default"
				}
			}).then(function (result) {
				if (result.value) {
					_formEl.submit(); // Submit form
				} else if (result.dismiss === 'cancel') {
					Swal.fire({
						text: "Your form has not been submitted!.",
						icon: "error",
						buttonsStyling: false,
						confirmButtonText: "Ok, got it!",
						customClass: {
							confirmButton: "btn font-weight-bold btn-primary",
						}
					});
				}
			});
		});
	}

	var _initValidation = function () {
		// Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
		// Step 1
		_validations.push(FormValidation.formValidation(
			_formEl,
			{
				 fields: {
				 	cnic:  {
				 		validators: {
							notEmpty: {
								message: 'Cnic is required'
							},
							digits: {
								message: 'The velue is not a valid Cnic'
							},
							stringLength: {
								min:13,
								max:13,
								message: 'Please enter a valid Number' 
							   },
						}
					},
					firstName:  {
						validators: {
							notEmpty: {
								message: 'first Name is required'
							},
							stringLength: {
							 min:4,
							 max:15,
							 message: 'Please enter a name within text length range 4 and 15 ' 
							},
							regexp: {
								regexp: /^[a-zs]+$/i,
								message: 'The full name can consist of alphabetical characters and spaces only'
							}
							
						}
						
					},
					dob:  {
						validators: {
							notEmpty: {
								message: 'Date Of Birth is required'
							},
							date: {
								format: 'YYYY/MM/DD',
								message: 'The value is not a valid date',
								min: '2000/01/01',
							}
							
						}
					},
					emergencyContact:  {
						validators: {
							notEmpty: {
								message: 'Emergency Contact is required'
							},
							digits: {
								message: 'The velue is not a valid Emergency Contact'
							},
							stringLength: {
								min:1,
								max:12,
								message: 'Please enter a valid Number' 
							   },
						}
					},
					workPhone:  {
						validators: {
							notEmpty: {
								message: 'Work Phone Contact is required'
							},
							digits: {
								message: 'The velue is not a valid work Phone'
							},
							stringLength: {
								min:1,
								max:12,
								message: 'Please enter a valid Number' 
							   },
						}
					},
					emergencyPhone:  {
						validators: {
							notEmpty: {
								message: 'Emergency Phone is required'
							},
							digits: {
								message: 'The velue is not a valid Emergency Phone'
							},
							stringLength: {
								min:11,
								max:12,
								message: 'Please enter a valid Number' 
							   },
						}
					},
					lastName: {
						validators: {
							notEmpty: {
								message: 'Last Name is required'
							},
							stringLength: {
								min:3,
								max:15,
								message: 'Please enter a name within text length range 3 and 15 '
								
							   },
							regexp: {
							regexp: /^[a-zs]+$/i,
							message: 'The full name can consist of alphabetical characters and spaces only'
							}
						}
						
					},
					homePhone: {
						validators: {
							notEmpty: {
								message: 'Phone is required'
							},
							digits: {
								message: 'The velue is not a valid Home Phone'
							},
							stringLength: {
								min:11,
								max:12,
								message: 'Please enter a valid Number' 
							   },
						}
					},
					email: {
						validators: {
							notEmpty: {
								message: 'Email is required'
							},
							emailAddress: {
								message: 'The value is not a valid Email address'
							}
						}
					},
					employeeAddress: {
						validators: {
							notEmpty: {
								message: 'Address is required'
							}
						}
					},
					postalCode: {
						validators: {
							notEmpty: {
								message: 'Postcode is required'
							}
						}
					},
					city: {
						validators: {
							notEmpty: {
								message: 'City is required'
							}
						}
					},
					state: {
						validators: {
							notEmpty: {
								message: 'State is required'
							}
						}
					},
					country: {
						validators: {
							notEmpty: {
								message: 'Country is required'
							}
						}
					}
					
				},

				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					// Bootstrap Framework Integration
					bootstrap: new FormValidation.plugins.Bootstrap({
						//eleInvalidClass: '',
						eleValidClass: '',
					})
				}
			}
		));

		// Step 2
		_validations.push(FormValidation.formValidation(
			_formEl,
			{
				// fields: {
				// 	employeeCode: {
				// 		validators: {
				// 			notEmpty: {
				// 				message: 'Employee Code is required'
				// 			}
				// 		}
				// 	},
				// 	hireDate: {
				// 		validators: {
				// 			notEmpty: {
				// 				message: 'Hire Date is required'
				// 			}
				// 		}
				// 	},
				// 	joinDate: {
				// 		validators: {
				// 			notEmpty: {
				// 				message: 'Join Date is required'
				// 			}
				// 		}
				// 	},
				// 	designation_id: {
				// 		validators: {
				// 			notEmpty: {
				// 				message: 'Designation is required'
				// 			}
				// 		}
				// 	},
				// 	location_id: {
				// 		validators: {
				// 			notEmpty: {
				// 				message: 'Location is required'
				// 			}
				// 		}
				// 	},
				// 	salary: {
				// 		validators: {
				// 			notEmpty: {
				// 				message: 'salary is required'
				// 			}
				// 		}
				// 	},
				// 	department_id: {
				// 		validators: {
				// 			notEmpty: {
				// 				message: 'Department is required'
				// 			}
				// 		}
				// 	}
			
				// },
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					// Bootstrap Framework Integration
					bootstrap: new FormValidation.plugins.Bootstrap({
						//eleInvalidClass: '',
						eleValidClass: '',
					})
				}
			}
		));

		// Step 3
		_validations.push(FormValidation.formValidation(
			_formEl,
			{
				fields: {
					ccname: {
						validators: {
							notEmpty: {
								message: 'Credit card name is required'
							}
						}
					},
					ccnumber: {
						validators: {
							notEmpty: {
								message: 'Credit card number is required'
							},
							creditCard: {
								message: 'The credit card number is not valid'
							}
						}
					},
					ccmonth: {
						validators: {
							notEmpty: {
								message: 'Credit card month is required'
							}
						}
					},
					ccyear: {
						validators: {
							notEmpty: {
								message: 'Credit card year is required'
							}
						}
					},
					cccvv: {
						validators: {
							notEmpty: {
								message: 'Credit card CVV is required'
							},
							digits: {
								message: 'The CVV value is not valid. Only numbers is allowed'
							}
						}
					}
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					// Bootstrap Framework Integration
					bootstrap: new FormValidation.plugins.Bootstrap({
						//eleInvalidClass: '',
						eleValidClass: '',
					})
				}
			}
		));
	}

	return {
		// public functions
		init: function () {
			_wizardEl = KTUtil.getById('kt_wizard');
			_formEl = KTUtil.getById('kt_form');

			_initWizard();
			_initValidation();
		}
	};
}();

jQuery(document).ready(function () {
	KTWizard4.init();
});
