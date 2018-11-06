package main

import (
	"database/sql"
	"fmt"
	_ "github.com/lib/pq"
)

const (
	host     = "localhost"
	port     = 5432
	user     = "postgres"
	password = " "
	dbname   = "postgres"
)

func checkErr(err error) {
	if err != nil {
		fmt.Println("error")
	}
}

func main() {
	psqlInfo := fmt.Sprintf("host=%s port=%d user=%s "+
		"password=%s dbname=%s sslmode=disable",
		host, port, user, password, dbname)
	db, err := sql.Open("postgres", psqlInfo)
	checkErr(err)
	defer db.Close()

	fmt.Println("Conectado a BD!")
	fmt.Println("# Consulta")
	rows ,err := db.Query("SELECT * FROM public.datos   ")
	checkErr(err)

	for   rows.Next() {

		var polucion string
		var hora string
		var fecha string
		err := rows.Scan(&polucion, &hora, &fecha)
		checkErr(err)
		//entero,err := strconv.Atoi(polucion)
		//checkErr(err)
		fmt.Printf("%3v | %8v | %6v \n ", polucion, hora, fecha)
		fmt.Println("--------------------------")


		}
	}


