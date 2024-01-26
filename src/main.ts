import PatientCalculations from './patientCalculations';

enum Genders {
  male = "male",
  female = "female",
}

async function main() {
  let flexibility: string = await PatientCalculations.getPatientFlex(Genders.female, 87, "8");
  console.log(flexibility);
  console.log("Hellooooooo");
}

main();


