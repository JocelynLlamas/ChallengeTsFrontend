enum Genders {
    male = "male",
    female = "female",
}
  
class PatientCalculations {
    static async getPatientFlex(gender: Genders, weight: number, shoeSize: string): Promise<string> {
      // Laravel api
      const response = await fetch('http://127.0.0.1:8000/api/getFlexibility', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify({ gender, weight, shoeSize }),
      });
  
      const result = await response.json();
      return result.flexibility;
    }
}
  
export default PatientCalculations;



  