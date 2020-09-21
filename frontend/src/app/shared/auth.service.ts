import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { HttpClient } from '@angular/common/http';


// User interface
export class User {
  name: String;
  email: String;
  password: String;
  password_confirmation: String
}

@Injectable({
  providedIn: 'root'
})

export class AuthService {

  constructor(private http: HttpClient) { }

  // User registration
  register(user: User): Observable<any> {


    return this.http.post('http://127.0.0.1:8000/api/auth/register', user);
  }

  // Login
  signin(user: User): Observable<any> {
    return this.http.post<any>('http://127.0.0.1:8000/api/auth/login', user);
  }

  // Access user profile
  profileUser(): Observable<any> {
    return this.http.get('http://127.0.0.1:8000/api/auth/user-profile');
  }

  // Access order detail
  orderDetail(): Observable<any> {
    return this.http.get('http://127.0.0.1:8000/api/auth/order/list');
  }

    // delete order detail
    orderDelete(id): Observable<any> {
      return this.http.delete('http://127.0.0.1:8000/api/auth/order/delete/' + id);
    }

     // update order detail
     orderUpdate(id,data): Observable<any> {
      return this.http.put('http://127.0.0.1:8000/api/auth/order/update/' + id,data);
    }

     // add discount
  orderAdd(data): Observable<any> {
   
    return this.http.post('http://127.0.0.1:8000/api/auth/order/add', data);
  }


}

