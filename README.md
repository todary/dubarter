# Project Title
dubarter 


## TASK
 Develop A laravel API to list, create, update and delete users

## Requirements 

Users schema:

id (primary key).
email (String) , Input is required/valid email.
password (string) Input is required and hashed has min length of 10
chars.
first_name (string), Input is required.
last_name (string), Input is required.
photo (String), Input is required as base64 data.

Using at least these technologies:
- Laravel
- MySQL

- Authentication endpoints using oauth2
- Users show endpoint is a public method (guest users can view it).
- Write methods (create, update and delete) should be protected (user
must be logged in).
- CORS must be enabled.
- Apply rate usage limit with 20 requests/minute on all endpoints.


## Installation
Using Composer :

```
composer install
```

If you don't have composer, you can get it from [Composer](https://getcomposer.org/)


## How to  Run the application

After composer install remove (.example) from .env.example and change director permission if use Linux os you can access from localhost on
 
make migration

```
php artisan migrate
```

###To register new user 

#### post method

##### route

```
http://your-doman/dubarter/public/api/register 
```

##### json

```
{
	"email":"user@user.com",
	"password":"123"
}
```




###To  login 

#### post method

##### route

```
http://your-doman/dubarter/public/api/login 
```

##### json

```
{
	"email":"user@user.com",
	"password":"123"
}

```





###To get user by email

#### get method

##### route

```
http://your-doman/dubarter/public/user/{email} 
```




###To get users

#### get method

##### route

```
http://your-doman/dubarter/public/users
```



###To create user

#### post method

##### route

```
http://your-doman/dubarter/public/api/user
```

##### json

```

{
	"email":"user2@user.com",
	"password":"123",
	"first_name":"user",
	"last_name":"user",
	"photo":"data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAALoAAACyCAMAAADCgyWuAAACHFBMVEUAAAA1NTUhISEiIiIoKCgvLy88PDxDQ0NUVFRpaWl9fX2SkpKnp6fHx8fs7Ow0NDRYWFh/f3+0tLTr6+tERER8fHy/v78zMzPJycmpqak3NzeXl5e2trZcXFze3t4sLCyxsbF5eXlSUlLx8fFLS0tFRUXq6upRUVF7e3vAwMC7u7u1tbWurq6ioqKMjIx2dnY2NjZzc3Oenp7u7u7BwcGHh4dNTU2cnJzi4uJAQECysrJJSUmhoaEuLi7n5+dVVVWkpKQ+Pj5+fn5WVlZlZWUnJyfy8vKrq6tHR0dnZ2esrKzf39+AgIBhYWFZWVnU1NSDg4M6OjojIyMpKSkyMjJiYmKPj4/IyMiKiorS0tLExMTY2NhKSkrFxcXd3d26urrt7e1ubm7Ly8vw8PDCwsLm5ua8vLwrKyvh4eGvr68kJCTDw8Pc3NwmJibj4+PX19fV1dU7OzvMzMyTk5N3d3djY2NoaGiQkJBgYGCIiIiwsLDPz8/b29va2tq3t7eCgoKGhoYxMTGOjo6ampr09PSgoKBwcHDl5eXv7+9ycnLg4OBXV1e9vb3T09NxcXHz8/OVlZUwMDBISEjR0dEtLS3Nzc1PT0+4uLjGxsaZmZlCQkKRkZE9PT2bm5vk5OR1dXW+vr5sbGwlJSXQ0NBGRkazs7NfX1/W1tajo6OWlpY5OTmNjY2oqKgqKirp6el4eHg/Pz/o6OiLi4uJiYnggnCXAAAAtHRSTlMA/////////////////+b//////////////////////////2b///////////////////+z////////////////////////TP/////////////////////////////////M//9///////////////////////////////////////////8Y////mf///////zL///////////////////////////////////////////////8I5JGaAAAFUElEQVR4nO3c+1sVRRgH8Jc5gAqGoBAIohleMisrLqYokYagWSioeSKlIG+AlKSRGqlpaTdRI1IqK9Pudv0Hg+gH2e/Mnr3Mzpn3eeb74zm7836efc7ZPWfm3SVycXFxcXFxcXFxceGVHBE4qdy8nPxZs+cUFM69ryjbbgpFn5F5xSXzF/Ck/5fSsvu50idTXlbBlT517BeypQtRWcWWLkT+IrZ0IaoXs6WLJQ+wpQuxlC9dPFjDli6WmfyBoJculq9gSxcrs0h/aJUyD69+5NHH1lQ/7mt/Inv0JzPvU1tX35BS2tcmj55OFPpUnipcp6Dnmro2RaVPZn2j3F6cIPfexKATbdgotRv6JRmLTk1Py+iVSWFnJh6dqEBmb05CColLp3oJ/ZlEqN7EptMmiX1+ElRv4tNpM9KfTUAK0UBfkQf0li0JUL3RQKcNeNhb9UshOujUBvSt2qEYLfRtQM/RDsVooVMl2J/TDcXooW8H+jbdUIweegXQN+mGYvTQaYl3mOc1OyXRRH/BO8zyaJz21h3VbTs3dnTuatu950X/bTXR93qH6ZRvl/ZkxpsvFXi+7tUm6Avhwy5dN+jybnXPe62lMMbLJuj7oOz+cPTufBjBEH0/lG0PRP9/uuyVVyVwQ/QmKNsTiD49W5bGS5o5ei+UfS0Q/cDUqwcPyeVm6ARlDwaiH5588UifQm6GXgRl+wPRB4jqjqrkZuiDUDbYZ/11SsOF2DA9DWXfCERP1xxTy83Q10PZYJekIflZ0ST9Te8wR6WbAf24n9wM/YR3mHXB6P4xQodJgbe40Hug6jAXehlUXRWJXvn2yVP9p99pGhxJ97y79sxZA/Rz3lFa5Nv50kvf6wpVVAv9PDAUywM+9M2hm1N00C/gMuD7Iemz6sKX1UHHOfY+xdKviv7BhfBVddArcDXvhGJTOb2jOQJcB/2iZNV4Xyj63Ejy+PSaZWhRno+l9Ij/EGLTLzVIMN1h6B9GlMelf4Tz00J8rNxcQj8WeRUhHv0TXNCYPL18Goau+lokSy+6LIELsVe9B9JV56JE6aNXrkrl13z2Qfpn5ukj9fC7ZTpj0mkvFX13dHk0+ufD43K3EKkv/HYE+nmd9OEDygwOtF8/UnV8PFflnswN32rJ0uPlpH81i+kZ5BbTM3Yl20o/tDpjNUvpEwH+nllJT5UEqWYjve16oGr20c8F/fVgG738ymjQanbRG5tDVLOKvj1UNavo5aH+5FhF9/tjYTu9s8kaeobzXAnY13ChF415d+gIMT+bVTp9CYc9RNdOdumE9zsEn4/IMr0Z6A1c6DQB9lNc6IuA/hUXOq0E+9dc6NjVeLWXCR3XpsVZLvSuDu9euTeZ0OkbOOyXudAvwtxdStphZyFdcl+MfyeoRfRenFuXdwXYR6cbQG/kQifs2Qpwa4kd9Fag7+RCp2tgz/z4CUvo3wI9r5YJnYrBfoYL/TTQWw4zodMcsH/Hhb74lnfn1PdM6JL2owy3hNtDX4A989K2dQvptAfot7nQR3HK0rcbyiK65C5Z3zvxbaITPn6ikAv9DtDHfB5vYxWdsL2kgAsdb2G7pX5UiV10+gHs8rZ7C+k/wqSMGGJCJ+y7m82FfhMbqlQNYLbRaQfQJ7jQa7HH9CcmdPoZ6Dnyjgf76PQL2H/lQv8N6Hd/Z0Kn22D/gwu9G+h9I0zokqcKydq7raQPAV1InhthJZ22An2cC30A70u/w4ROS4H+Jxf6X3fBDmNZSqe/gb7L29NmK31LOdj/YUKn/ipvvINppbu4uLi4uLi4uLi4uLi4uLi4uLi4uLgYyL/DDi33KX++hgAAAABJRU5ErkJggg=="
}


```

##### header
```
Accept : application/json
Authorization : Bearer +'your token'
```






###To update user

#### put method

##### route

```
http://your-doman/dubarter/public/api/user/{email}  
```

##### json

```

{
	"email":"user2@user.com",
	"password":"123",
	"first_name":"user",
	"last_name":"user",
	"photo":"data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAALoAAACyCAMAAADCgyWuAAACHFBMVEUAAAA1NTUhISEiIiIoKCgvLy88PDxDQ0NUVFRpaWl9fX2SkpKnp6fHx8fs7Ow0NDRYWFh/f3+0tLTr6+tERER8fHy/v78zMzPJycmpqak3NzeXl5e2trZcXFze3t4sLCyxsbF5eXlSUlLx8fFLS0tFRUXq6upRUVF7e3vAwMC7u7u1tbWurq6ioqKMjIx2dnY2NjZzc3Oenp7u7u7BwcGHh4dNTU2cnJzi4uJAQECysrJJSUmhoaEuLi7n5+dVVVWkpKQ+Pj5+fn5WVlZlZWUnJyfy8vKrq6tHR0dnZ2esrKzf39+AgIBhYWFZWVnU1NSDg4M6OjojIyMpKSkyMjJiYmKPj4/IyMiKiorS0tLExMTY2NhKSkrFxcXd3d26urrt7e1ubm7Ly8vw8PDCwsLm5ua8vLwrKyvh4eGvr68kJCTDw8Pc3NwmJibj4+PX19fV1dU7OzvMzMyTk5N3d3djY2NoaGiQkJBgYGCIiIiwsLDPz8/b29va2tq3t7eCgoKGhoYxMTGOjo6ampr09PSgoKBwcHDl5eXv7+9ycnLg4OBXV1e9vb3T09NxcXHz8/OVlZUwMDBISEjR0dEtLS3Nzc1PT0+4uLjGxsaZmZlCQkKRkZE9PT2bm5vk5OR1dXW+vr5sbGwlJSXQ0NBGRkazs7NfX1/W1tajo6OWlpY5OTmNjY2oqKgqKirp6el4eHg/Pz/o6OiLi4uJiYnggnCXAAAAtHRSTlMA/////////////////+b//////////////////////////2b///////////////////+z////////////////////////TP/////////////////////////////////M//9///////////////////////////////////////////8Y////mf///////zL///////////////////////////////////////////////8I5JGaAAAFUElEQVR4nO3c+1sVRRgH8Jc5gAqGoBAIohleMisrLqYokYagWSioeSKlIG+AlKSRGqlpaTdRI1IqK9Pudv0Hg+gH2e/Mnr3Mzpn3eeb74zm7836efc7ZPWfm3SVycXFxcXFxcXFxceGVHBE4qdy8nPxZs+cUFM69ryjbbgpFn5F5xSXzF/Ck/5fSsvu50idTXlbBlT517BeypQtRWcWWLkT+IrZ0IaoXs6WLJQ+wpQuxlC9dPFjDli6WmfyBoJculq9gSxcrs0h/aJUyD69+5NHH1lQ/7mt/Inv0JzPvU1tX35BS2tcmj55OFPpUnipcp6Dnmro2RaVPZn2j3F6cIPfexKATbdgotRv6JRmLTk1Py+iVSWFnJh6dqEBmb05CColLp3oJ/ZlEqN7EptMmiX1+ElRv4tNpM9KfTUAK0UBfkQf0li0JUL3RQKcNeNhb9UshOujUBvSt2qEYLfRtQM/RDsVooVMl2J/TDcXooW8H+jbdUIweegXQN+mGYvTQaYl3mOc1OyXRRH/BO8zyaJz21h3VbTs3dnTuatu950X/bTXR93qH6ZRvl/ZkxpsvFXi+7tUm6Avhwy5dN+jybnXPe62lMMbLJuj7oOz+cPTufBjBEH0/lG0PRP9/uuyVVyVwQ/QmKNsTiD49W5bGS5o5ei+UfS0Q/cDUqwcPyeVm6ARlDwaiH5588UifQm6GXgRl+wPRB4jqjqrkZuiDUDbYZ/11SsOF2DA9DWXfCERP1xxTy83Q10PZYJekIflZ0ST9Te8wR6WbAf24n9wM/YR3mHXB6P4xQodJgbe40Hug6jAXehlUXRWJXvn2yVP9p99pGhxJ97y79sxZA/Rz3lFa5Nv50kvf6wpVVAv9PDAUywM+9M2hm1N00C/gMuD7Iemz6sKX1UHHOfY+xdKviv7BhfBVddArcDXvhGJTOb2jOQJcB/2iZNV4Xyj63Ejy+PSaZWhRno+l9Ij/EGLTLzVIMN1h6B9GlMelf4Tz00J8rNxcQj8WeRUhHv0TXNCYPL18Goau+lokSy+6LIELsVe9B9JV56JE6aNXrkrl13z2Qfpn5ukj9fC7ZTpj0mkvFX13dHk0+ufD43K3EKkv/HYE+nmd9OEDygwOtF8/UnV8PFflnswN32rJ0uPlpH81i+kZ5BbTM3Yl20o/tDpjNUvpEwH+nllJT5UEqWYjve16oGr20c8F/fVgG738ymjQanbRG5tDVLOKvj1UNavo5aH+5FhF9/tjYTu9s8kaeobzXAnY13ChF415d+gIMT+bVTp9CYc9RNdOdumE9zsEn4/IMr0Z6A1c6DQB9lNc6IuA/hUXOq0E+9dc6NjVeLWXCR3XpsVZLvSuDu9euTeZ0OkbOOyXudAvwtxdStphZyFdcl+MfyeoRfRenFuXdwXYR6cbQG/kQifs2Qpwa4kd9Fag7+RCp2tgz/z4CUvo3wI9r5YJnYrBfoYL/TTQWw4zodMcsH/Hhb74lnfn1PdM6JL2owy3hNtDX4A989K2dQvptAfot7nQR3HK0rcbyiK65C5Z3zvxbaITPn6ikAv9DtDHfB5vYxWdsL2kgAsdb2G7pX5UiV10+gHs8rZ7C+k/wqSMGGJCJ+y7m82FfhMbqlQNYLbRaQfQJ7jQa7HH9CcmdPoZ6Dnyjgf76PQL2H/lQv8N6Hd/Z0Kn22D/gwu9G+h9I0zokqcKydq7raQPAV1InhthJZ22An2cC30A70u/w4ROS4H+Jxf6X3fBDmNZSqe/gb7L29NmK31LOdj/YUKn/ipvvINppbu4uLi4uLi4uLi4uLi4uLi4uLi4uLgYyL/DDi33KX++hgAAAABJRU5ErkJggg=="
}


```

##### header
```
Accept : application/json
Authorization : Bearer +'your token'
```





###To delete user

#### delete method

##### route

```
http://your-doman/dubarter/public/api/user/{email}  
```


##### header
```
Accept : application/json
Authorization : Bearer +'your token'
```


