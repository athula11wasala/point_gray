import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import {AuthService} from './../../../shared/auth.service';


// User interface
export class Order {
  idaa:BigInteger;
  name: String;
  percentage: String;
  no_of_service:string;
}

@Component({
  selector: 'app-discount-list',
  templateUrl: './discount-list.component.html',
  styleUrls: ['./discount-list.component.scss']
})

export class DiscountListComponent implements OnInit {
  orderDetail: Order;
  editField: string;
  constructor(
    public authService: AuthService,
    public router: Router
  ) {
    this.refreshList();
  }

  ngOnInit() { }
 
  updateList(id: number, property: string, event: any) {
  
    const order ={
      property_name:property,
      property_value: event.target.textContent,
      };

    this.authService.orderUpdate(id,order).subscribe((data:any) => {
      this.refreshList();
    })
  }

  remove(id: any) {
  
    this.authService.orderDelete(id).subscribe((data:any) => {
      this.refreshList();
    })
  }
  refreshList() {

    this.authService.orderDetail().subscribe((data:any) => {
      this.orderDetail = data.data;
    })

  }
  add() {
    this.router.navigate(['discount-add']);
  }

  changeValue(id: number, property: string, event: any) {
    this.editField = event.target.textContent;
  }

}
