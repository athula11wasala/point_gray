import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import {AuthService} from './../../../shared/auth.service';
import { FormBuilder, FormGroup } from "@angular/forms";

@Component({
  selector: 'app-discount-add',
  templateUrl: './discount-add.component.html',
  styleUrls: ['./discount-add.component.scss']
})

export class DiscountAddComponent  implements OnInit {
  discountForm: FormGroup;
  errors = null;

  constructor(
    public router: Router,
    public fb: FormBuilder,
    public authService: AuthService
  ) {
    this.discountForm = this.fb.group({
      name: [''],
      percentage: [''],
      no_of_service: ['']
    })
  }

  ngOnInit() { }

  onSubmit() {
    
    this.authService.orderAdd(this.discountForm.value).subscribe(
      result => {
        console.log(result)
      },
      error => {
        console.log(error.error[0].name);
        this.errors = error.error[0];
      },
      () => {
        this.discountForm.reset()
        this.router.navigate(['discount']);
      }
    )
  }

}
