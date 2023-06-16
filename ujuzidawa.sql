-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2023 at 05:32 PM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ujuzidawa`
--

-- --------------------------------------------------------

--
-- Table structure for table `description`
--

CREATE TABLE `description` (
  `desc_id` int(11) NOT NULL,
  `disease` mediumtext NOT NULL,
  `definition` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `description`
--

INSERT INTO `description` (`desc_id`, `disease`, `definition`) VALUES
(1, 'Drug Reaction', 'An adverse drug reaction (ADR) is an injury caused by taking medication. ADRs may occur following a single dose or prolonged administration of a drug or result from the combination of two or more drugs.'),
(2, 'Malaria', 'An infectious disease caused by protozoan parasites from the Plasmodium family that can be transmitted by the bite of the Anopheles mosquito or by a contaminated needle or transfusion. Falciparum malaria is the most deadly type.'),
(3, 'Allergy', 'An allergy is an immune system response to a foreign substance that\'s not typically harmful to your body.They can include certain foods, pollen, or pet dander. Your immune system\'s job is to keep you healthy by fighting harmful pathogens.'),
(4, 'Hypothyroidism', 'Hypothyroidism, also called underactive thyroid or low thyroid, is a disorder of the endocrine system in which the thyroid gland does not produce enough thyroid hormone.'),
(5, 'Psoriasis', 'Psoriasis is a common skin disorder that forms thick, red, bumpy patches covered with silvery scales. They can pop up anywhere, but most appear on the scalp, elbows, knees, and lower back. Psoriasis can\'t be passed from person to person. It does sometimes happen in members of the same family.'),
(6, 'GERD', 'Gastroesophageal reflux disease, or GERD, is a digestive disorder that affects the lower esophageal sphincter (LES), the ring of muscle between the esophagus and stomach. Many people, including pregnant women, suffer from heartburn or acid indigestion caused by GERD.'),
(7, 'Chronic cholestasis', 'Chronic cholestatic diseases, whether occurring in infancy, childhood or adulthood, are characterized by defective bile acid transport from the liver to the intestine, which is caused by primary damage to the biliary epithelium in most cases'),
(8, 'hepatitis A', 'Hepatitis A is a highly contagious liver infection caused by the hepatitis A virus. The virus is one of several types of hepatitis viruses that cause inflammation and affect your liver\'s ability to function.'),
(9, 'Osteoarthristis', 'Osteoarthritis is the most common form of arthritis, affecting millions of people worldwide. It occurs when the protective cartilage that cushions the ends of your bones wears down over time.'),
(10, '(vertigo) Paroymsal  Positional Vertigo', 'Benign paroxysmal positional vertigo (BPPV) is one of the most common causes of vertigo — the sudden sensation that you\'re spinning or that the inside of your head is spinning. Benign paroxysmal positional vertigo causes brief episodes of mild to intense dizziness.'),
(11, 'Hypoglycemia', 'Hypoglycemia is a condition in which your blood sugar (glucose) level is lower than normal. Glucose is your body\'s main energy source. Hypoglycemia is often related to diabetes treatment. But other drugs and a variety of conditions — many rare — can cause low blood sugar in people who don\'t have diabetes.'),
(12, 'Acne', 'Acne vulgaris is the formation of comedones, papules, pustules, nodules, and/or cysts as a result of obstruction and inflammation of pilosebaceous units (hair follicles and their accompanying sebaceous gland). Acne develops on the face and upper trunk. It most often affects adolescents.'),
(13, 'Diabetes', 'Diabetes is a disease that occurs when your blood glucose, also called blood sugar, is too high. Blood glucose is your main source of energy and comes from the food you eat. Insulin, a hormone made by the pancreas, helps glucose from food get into your cells to be used for energy.'),
(14, 'Impetigo', 'Impetigo (im-puh-TIE-go) is a common and highly contagious skin infection that mainly affects infants and children. Impetigo usually appears as red sores on the face, especially around a child\'s nose and mouth, and on hands and feet. The sores burst and develop honey-colored crusts.'),
(15, 'Hypertension', 'Hypertension (HTN or HT), also known as high blood pressure (HBP), is a long-term medical condition in which the blood pressure in the arteries is persistently elevated. High blood pressure typically does not cause symptoms.'),
(16, 'Peptic ulcer diseae', 'Peptic ulcer disease (PUD) is a break in the inner lining of the stomach, the first part of the small intestine, or sometimes the lower esophagus. An ulcer in the stomach is called a gastric ulcer, while one in the first part of the intestines is a duodenal ulcer.'),
(17, 'Dimorphic hemorrhoids(piles)', 'Hemorrhoids, also spelled haemorrhoids, are vascular structures in the anal canal. In their ... Other names, Haemorrhoids, piles, hemorrhoidal disease .'),
(18, 'Common Cold', 'The common cold is a viral infection of your nose and throat (upper respiratory tract). It\'s usually harmless, although it might not feel that way. Many types of viruses can cause a common cold.'),
(19, 'Chicken pox', 'Chickenpox is a highly contagious disease caused by the varicella-zoster virus (VZV). It can cause an itchy, blister-like rash. The rash first appears on the chest, back, and face, and then spreads over the entire body, causing between 250 and 500 itchy blisters.'),
(20, 'Cervical spondylosis', 'Cervical spondylosis is a general term for age-related wear and tear affecting the spinal disks in your neck. As the disks dehydrate and shrink, signs of osteoarthritis develop, including bony projections along the edges of bones (bone spurs).'),
(21, 'Hyperthyroidism', 'Hyperthyroidism (overactive thyroid) occurs when your thyroid gland produces too much of the hormone thyroxine. Hyperthyroidism can accelerate your body\'s metabolism, causing unintentional weight loss and a rapid or irregular heartbeat.'),
(22, 'Urinary tract infection', 'Urinary tract infection: An infection of the kidney, ureter, bladder, or urethra. Abbreviated UTI. Not everyone with a UTI has symptoms, but common symptoms include a frequent urge to urinate and pain or burning when urinating.'),
(23, 'Varicose veins', 'A vein that has enlarged and twisted, often appearing as a bulging, blue blood vessel that is clearly visible through the skin. Varicose veins are most common in older adults, particularly women, and occur especially on the legs.'),
(24, 'AIDS', 'Acquired immunodeficiency syndrome (AIDS) is a chronic, potentially life-threatening condition caused by the human immunodeficiency virus (HIV). By damaging your immune system, HIV interferes with your body\'s ability to fight infection and disease.'),
(25, 'Paralysis (brain hemorrhage)', 'Intracerebral hemorrhage (ICH) is when blood suddenly bursts into brain tissue, causing damage to your brain. Symptoms usually appear suddenly during ICH. They include headache, weakness, confusion, and paralysis, particularly on one side of your body.'),
(26, 'Typhoid', 'An acute illness characterized by fever caused by infection with the bacterium Salmonella typhi. Typhoid fever has an insidious onset, with fever, headache, constipation, malaise, chills, and muscle pain. Diarrhea is uncommon, and vomiting is not usually severe.'),
(27, 'Hepatitis B', 'Hepatitis B is an infection of your liver. It can cause scarring of the organ, liver failure, and cancer. It can be fatal if it isn\'t treated. It\'s spread when people come in contact with the blood, open sores, or body fluids of someone who has the hepatitis B virus.'),
(28, 'Fungal infection', 'In humans, fungal infections occur when an invading fungus takes over an area of the body and is too much for the immune system to handle. Fungi can live in the air, soil, water, and plants. There are also some fungi that live naturally in the human body. Like many microbes, there are helpful fungi and harmful fungi.'),
(29, 'Hepatitis C', 'Inflammation of the liver due to the hepatitis C virus (HCV), which is usually spread via blood transfusion (rare), hemodialysis, and needle sticks. The damage hepatitis C does to the liver can lead to cirrhosis and its complications as well as cancer.'),
(30, 'Migraine', 'A migraine can cause severe throbbing pain or a pulsing sensation, usually on one side of the head. It\'s often accompanied by nausea, vomiting, and extreme sensitivity to light and sound. Migraine attacks can last for hours to days, and the pain can be so severe that it interferes with your daily activities.'),
(31, 'Bronchial Asthma', 'Bronchial asthma is a medical condition which causes the airway path of the lungs to swell and narrow. Due to this swelling, the air path produces excess mucus making it hard to breathe, which results in coughing, short breath, and wheezing. The disease is chronic and interferes with daily working.'),
(32, 'Alcoholic hepatitis', 'Alcoholic hepatitis is a diseased, inflammatory condition of the liver caused by heavy alcohol consumption over an extended period of time. It\'s also aggravated by binge drinking and ongoing alcohol use. If you develop this condition, you must stop drinking alcohol'),
(33, 'Jaundice', 'Yellow staining of the skin and sclerae (the whites of the eyes) by abnormally high blood levels of the bile pigment bilirubin. The yellowing extends to other tissues and body fluids. Jaundice was once called the \"morbus regius\" (the regal disease) in the belief that only the touch of a king could cure it'),
(34, 'Hepatitis E', 'A rare form of liver inflammation caused by infection with the hepatitis E virus (HEV). It is transmitted via food or drink handled by an infected person or through infected water supplies in areas where fecal matter may get into the water. Hepatitis E does not cause chronic liver disease.'),
(35, 'Dengue', 'an acute infectious disease caused by a flavivirus (species Dengue virus of the genus Flavivirus), transmitted by aedes mosquitoes, and characterized by headache, severe joint pain, and a rash. — called also breakbone fever, dengue fever.'),
(36, 'Hepatitis D', 'Hepatitis D, also known as the hepatitis delta virus, is an infection that causes the liver to become inflamed. This swelling can impair liver function and cause long-term liver problems, including liver scarring and cancer. The condition is caused by the hepatitis D virus (HDV).'),
(37, 'Heart attack', 'The death of heart muscle due to the loss of blood supply. The loss of blood supply is usually caused by a complete blockage of a coronary artery, one of the arteries that supplies blood to the heart muscle.'),
(38, 'Pneumonia', 'Pneumonia is an infection in one or both lungs. Bacteria, viruses, and fungi cause it. The infection causes inflammation in the air sacs in your lungs, which are called alveoli. The alveoli fill with fluid or pus, making it difficult to breathe.'),
(39, 'Arthritis', 'Arthritis is the swelling and tenderness of one or more of your joints. The main symptoms of arthritis are joint pain and stiffness, which typically worsen with age. The most common types of arthritis are osteoarthritis and rheumatoid arthritis.'),
(40, 'Gastroenteritis', 'Gastroenteritis is an inflammation of the digestive tract, particularly the stomach, and large and small intestines. Viral and bacterial gastroenteritis are intestinal infections associated with symptoms of diarrhea , abdominal cramps, nausea , and vomiting .'),
(41, 'Tuberculosis', 'Tuberculosis (TB) is an infectious disease usually caused by Mycobacterium tuberculosis (MTB) bacteria. Tuberculosis generally affects the lungs, but can also affect other parts of the body. Most infections show no symptoms, in which case it is known as latent tuberculosis.');

-- --------------------------------------------------------

--
-- Table structure for table `precaution_remedy`
--

CREATE TABLE `precaution_remedy` (
  `disease_id` int(11) NOT NULL,
  `disease` text NOT NULL,
  `remedy_1` text NOT NULL,
  `remedy_2` text NOT NULL,
  `remedy_3` text NOT NULL,
  `remedy_4` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `precaution_remedy`
--

INSERT INTO `precaution_remedy` (`disease_id`, `disease`, `remedy_1`, `remedy_2`, `remedy_3`, `remedy_4`) VALUES
(1, 'Drug Reaction', 'stop irritation', 'consult nearest hospital', 'stop taking drug', 'follow up'),
(2, 'Malaria', 'Consult nearest hospital', 'avoid oily food', 'avoid non veg food', 'keep mosquitos out'),
(3, 'Allergy', 'apply calamine', 'cover area with bandage', '', 'use ice to compress itching'),
(4, 'Hypothyroidism', 'reduce stress', 'exercise', 'eat healthy', 'get proper sleep'),
(5, 'Psoriasis', 'wash hands with warm soapy water', 'stop bleeding using pressure', 'consult doctor', 'salt baths'),
(6, 'GERD', 'avoid fatty spicy food', 'avoid lying down after eating', 'maintain healthy weight', 'exercise'),
(7, 'Chronic cholestasis', 'cold baths', 'anti itch medicine', 'consult doctor', 'eat healthy'),
(8, 'hepatitis A', 'Consult nearest hospital', 'wash hands through', 'avoid fatty spicy food', 'medication'),
(9, 'Osteoarthristis', 'acetaminophen', 'consult nearest hospital', 'follow up', 'salt baths'),
(10, '(vertigo) Paroymsal  Positional Vertigo', 'lie down', 'avoid sudden change in body', 'avoid abrupt head movment', 'relax'),
(11, 'Hypoglycemia', 'lie down on side', 'check in pulse', 'drink sugary drinks', 'consult doctor'),
(12, 'Acne', 'bath twice', 'avoid fatty spicy food', 'drink plenty of water', 'avoid too many products'),
(13, 'Diabetes ', 'have balanced diet', 'exercise', 'consult doctor', 'follow up'),
(14, 'Impetigo', 'soak affected area in warm water', 'use antibiotics', 'remove scabs with wet compressed cloth', 'consult doctor'),
(15, 'Hypertension ', 'meditation', 'salt baths', 'reduce stress', 'get proper sleep'),
(16, 'Peptic ulcer diseae', 'avoid fatty spicy food', 'consume probiotic food', 'eliminate milk', 'limit alcohol'),
(17, 'Dimorphic hemmorhoids(piles)', 'avoid fatty spicy food', 'consume witch hazel', 'warm bath with epsom salt', 'consume alovera juice'),
(18, 'Common Cold', 'drink vitamin c rich drinks', 'take vapour', 'avoid cold food', 'keep fever in check'),
(19, 'Chicken pox', 'use neem in bathing ', 'consume neem leaves', 'take vaccine', 'avoid public places'),
(20, 'Cervical spondylosis', 'use heating pad or cold pack', 'exercise', 'take otc pain reliver', 'consult doctor'),
(21, 'Hyperthyroidism', 'eat healthy', 'massage', 'use lemon balm', 'take radioactive iodine treatment'),
(22, 'Urinary tract infection', 'drink plenty of water', 'increase vitamin c intake', 'drink cranberry juice', 'take probiotics'),
(23, 'Varicose veins', 'lie down flat and raise the leg high', 'use oinments', 'use vein compression', 'dont stand still for long'),
(24, 'AIDS', 'avoid open cuts', 'wear ppe if possible', 'consult doctor', 'follow up'),
(25, 'Paralysis (brain hemorrhage)', 'massage', 'eat healthy', 'exercise', 'consult doctor'),
(26, 'Typhoid', 'eat high calorie vegitables', 'antiboitic therapy', 'consult doctor', 'medication'),
(27, 'Hepatitis B', 'consult nearest hospital', 'vaccination', 'eat healthy', 'medication'),
(28, 'Fungal infection', 'bath twice', 'use detol or neem in bathing water', 'keep infected area dry', 'use clean cloths'),
(29, 'Hepatitis C', 'Consult nearest hospital', 'vaccination', 'eat healthy', 'medication'),
(30, 'Migraine', 'meditation', 'reduce stress', 'use poloroid glasses in sun', 'consult doctor'),
(31, 'Bronchial Asthma', 'switch to loose cloothing', 'take deep breaths', 'get away from trigger', 'seek help'),
(32, 'Alcoholic hepatitis', 'stop alcohol consumption', 'consult doctor', 'medication', 'follow up'),
(33, 'Jaundice', 'drink plenty of water', 'consume milk thistle', 'eat fruits and high fiberous food', 'medication'),
(34, 'Hepatitis E', 'stop alcohol consumption', 'rest', 'consult doctor', 'medication'),
(35, 'Dengue', 'drink papaya leaf juice', 'avoid fatty spicy food', 'keep mosquitos away', 'keep hydrated'),
(36, 'Hepatitis D', 'consult doctor', 'medication', 'eat healthy', 'follow up'),
(37, 'Heart attack', 'call ambulance', 'chew or swallow asprin', 'keep calm', ''),
(38, 'Pneumonia', 'consult doctor', 'medication', 'rest', 'follow up'),
(39, 'Arthritis', 'exercise', 'use hot and cold therapy', 'try acupuncture', 'massage'),
(40, 'Gastroenteritis', 'stop eating solid food for while', 'try taking small sips of water', 'rest', 'ease back into eating'),
(41, 'Tuberculosis', 'cover mouth', 'consult doctor', 'medication', 'rest');

-- --------------------------------------------------------

--
-- Table structure for table `severity`
--

CREATE TABLE `severity` (
  `sev_id` int(11) NOT NULL,
  `symptom` text NOT NULL,
  `weigh` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `severity`
--

INSERT INTO `severity` (`sev_id`, `symptom`, `weigh`) VALUES
(1, 'itching', 1),
(2, 'skin rash', 3),
(3, 'nodal skin eruptions', 4),
(4, 'continuous sneezing', 4),
(5, 'shivering', 5),
(6, 'chills', 3),
(7, 'joint pain', 3),
(8, 'stomach pain', 5),
(9, 'acidity', 3),
(10, 'ulcers on tongue', 4),
(11, 'muscle wasting', 3),
(12, 'vomiting', 5),
(13, 'burning micturition', 6),
(14, 'spotting urination', 6),
(15, 'fatigue', 4),
(16, 'weight gain', 3),
(17, 'anxiety', 4),
(18, 'cold hands and feets', 5),
(19, 'mood swings', 3),
(20, 'weight loss', 3),
(21, 'restlessness', 5),
(22, 'lethargy', 2),
(23, 'patches in throat', 6),
(24, 'irregular sugar level', 5),
(25, 'cough', 4),
(26, 'high fever', 7),
(27, 'sunken eyes', 3),
(28, 'breathlessness', 4),
(29, 'sweating', 3),
(30, 'dehydration', 4),
(31, 'indigestion', 5),
(32, 'headache', 3),
(33, 'yellowish skin', 3),
(34, 'dark urine', 4),
(35, 'nausea', 5),
(36, 'loss of appetite', 4),
(37, 'pain behind the eyes', 4),
(38, 'back pain', 3),
(39, 'constipation', 4),
(40, 'abdominal pain', 4),
(41, 'diarrhoea', 6),
(42, 'mild fever', 5),
(43, 'yellow urine', 4),
(44, 'yellowing of eyes', 4),
(45, 'acute liver failure', 6),
(46, 'fluid overload', 6),
(47, 'swelling of stomach', 7),
(48, 'swelled lymph nodes', 6),
(49, 'malaise', 6),
(50, 'blurred and distorted vision', 5),
(51, 'phlegm', 5),
(52, 'throat irritation', 4),
(53, 'redness of eyes', 5),
(54, 'sinus pressure', 4),
(55, 'runny nose', 5),
(56, 'congestion', 5),
(57, 'chest pain', 7),
(58, 'weakness in limbs', 7),
(59, 'fast heart rate', 5),
(60, 'pain during bowel movements', 5),
(61, 'pain in anal region', 6),
(62, 'bloody stool', 5),
(63, 'irritation in anus', 6),
(64, 'neck pain', 5),
(65, 'dizziness', 4),
(66, 'cramps', 4),
(67, 'bruising', 4),
(68, 'obesity', 4),
(69, 'swollen legs', 5),
(70, 'swollen blood vessels', 5),
(71, 'puffy face and eyes', 5),
(72, 'enlarged thyroid', 6),
(73, 'brittle nails', 5),
(74, 'swollen extremeties', 5),
(75, 'excessive hunger', 4),
(76, 'extra marital contacts', 5),
(77, 'drying and tingling lips', 4),
(78, 'slurred speech', 4),
(79, 'knee pain', 3),
(80, 'hip joint pain', 2),
(81, 'muscle weakness', 2),
(82, 'stiff neck', 4),
(83, 'swelling joints', 5),
(84, 'movement stiffness', 5),
(85, 'spinning movements', 6),
(86, 'loss of balance', 4),
(87, 'unsteadiness', 4),
(88, 'weakness of one body side', 4),
(89, 'loss of smell', 3),
(90, 'bladder discomfort', 4),
(91, 'foul smell ofurine', 5),
(92, 'continuous feel of urine', 6),
(93, 'passage of gases', 5),
(94, 'internal itching', 4),
(95, 'toxic look (typhos)', 5),
(96, 'depression', 3),
(97, 'irritability', 2),
(98, 'muscle pain', 2),
(99, 'altered sensorium', 2),
(100, 'red spots over body', 3),
(101, 'belly pain', 4),
(102, 'abnormal menstruation', 6),
(103, 'dischromic patches', 6),
(104, 'watering from eyes', 4),
(105, 'increased appetite', 5),
(106, 'polyuria', 4),
(107, 'family history', 5),
(108, 'mucoid sputum', 4),
(109, 'rusty sputum', 4),
(110, 'lack of concentration', 3),
(111, 'visual disturbances', 3),
(112, 'receiving blood transfusion', 5),
(113, 'receiving unsterile injections', 2),
(114, 'coma', 7),
(115, 'stomach bleeding', 6),
(116, 'distention of abdomen', 4),
(117, 'history of alcohol consumption', 5),
(118, 'fluid overload', 4),
(119, 'blood in sputum', 5),
(120, 'prominent veins on calf', 6),
(121, 'palpitations', 4),
(122, 'painful walking', 2),
(123, 'pus filled pimples', 2),
(124, 'blackheads', 2),
(125, 'scurring', 2),
(126, 'skin peeling', 3),
(127, 'silver like dusting', 2),
(128, 'small dents in nails', 2),
(129, 'inflammatory nails', 2),
(130, 'blister', 4),
(131, 'red sore around nose', 2),
(132, 'yellow crust ooze', 3),
(133, 'prognosis', 5);

-- --------------------------------------------------------

--
-- Table structure for table `symptoms`
--

CREATE TABLE `symptoms` (
  `symp_id` int(11) NOT NULL,
  `disease` text NOT NULL,
  `symptom_1` mediumtext NOT NULL,
  `symptom_2` mediumtext NOT NULL,
  `symptom_3` mediumtext NOT NULL,
  `symptom_4` mediumtext NOT NULL,
  `symptom_5` mediumtext NOT NULL,
  `symptom_6` mediumtext NOT NULL,
  `symptom_7` mediumtext NOT NULL,
  `symptom_8` mediumtext NOT NULL,
  `symptom_9` mediumtext NOT NULL,
  `symptom_10` mediumtext NOT NULL,
  `symptom_11` mediumtext NOT NULL,
  `symptom_12` mediumtext NOT NULL,
  `symptom_13` mediumtext NOT NULL,
  `symptom_14` mediumtext NOT NULL,
  `symptom_15` mediumtext NOT NULL,
  `symptom_16` mediumtext NOT NULL,
  `symptom_17` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `symptoms`
--

INSERT INTO `symptoms` (`symp_id`, `disease`, `symptom_1`, `symptom_2`, `symptom_3`, `symptom_4`, `symptom_5`, `symptom_6`, `symptom_7`, `symptom_8`, `symptom_9`, `symptom_10`, `symptom_11`, `symptom_12`, `symptom_13`, `symptom_14`, `symptom_15`, `symptom_16`, `symptom_17`) VALUES
(1, 'Fungal infection', 'itching', 'skin rash', 'nodal skin eruptions', 'dischromic  patches', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(2, 'Fungal infection', 'skin rash', 'nodal skin eruptions', 'dischromic  patches', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(3, 'Fungal infection', 'itching', 'nodal skin eruptions', 'dischromic  patches', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(4, 'Fungal infection', 'itching', 'skin rash', 'dischromic  patches', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(5, 'Fungal infection', 'itching', 'skin rash', 'nodal skin eruptions', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(6, 'Allergy', 'continuous sneezing', 'shivering', 'chills', 'watering from eyes', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(7, 'Allergy', 'shivering', 'chills', 'watering from eyes', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(8, 'Allergy', 'continuous sneezing', 'chills', 'watering from eyes', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(9, 'Allergy', 'continuous sneezing', 'shivering', 'watering from eyes', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(10, 'Allergy', 'continuous sneezing', 'shivering', 'chills', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(11, 'GERD', 'stomach pain', 'acidity', 'ulcers on tongue', 'vomiting', 'cough', 'chest pain', '', '', '', '', '', '', '', '', '', '', ''),
(12, 'GERD', 'stomach pain', 'ulcers on tongue', 'vomiting', 'cough', 'chest pain', '', '', '', '', '', '', '', '', '', '', '', ''),
(13, 'GERD', 'stomach pain', 'acidity', 'vomiting', 'cough', 'chest pain', '', '', '', '', '', '', '', '', '', '', '', ''),
(14, 'GERD', 'stomach pain', 'acidity', 'ulcers on tongue', 'cough', 'chest pain', '', '', '', '', '', '', '', '', '', '', '', ''),
(15, 'GERD', 'stomach pain', 'acidity', 'ulcers on tongue', 'vomiting', 'chest pain', '', '', '', '', '', '', '', '', '', '', '', ''),
(16, 'GERD', 'stomach pain', 'acidity', 'ulcers on tongue', 'vomiting', 'cough', '', '', '', '', '', '', '', '', '', '', '', ''),
(17, 'GERD', 'acidity', 'ulcers on tongue', 'vomiting', 'cough', 'chest pain', '', '', '', '', '', '', '', '', '', '', '', ''),
(18, 'Chronic cholestasis', 'itching', 'vomiting', 'yellowish skin', 'nausea', 'loss of appetite', 'abdominal pain', 'yellowing of eyes', '', '', '', '', '', '', '', '', '', ''),
(19, 'Chronic cholestasis', 'vomiting', 'yellowish skin', 'nausea', 'loss of appetite', 'abdominal pain', 'yellowing of eyes', '', '', '', '', '', '', '', '', '', '', ''),
(20, 'Chronic cholestasis', 'itching', 'yellowish skin', 'nausea', 'loss of appetite', 'abdominal pain', 'yellowing of eyes', '', '', '', '', '', '', '', '', '', '', ''),
(21, 'Chronic cholestasis', 'itching', 'vomiting', 'nausea', 'loss of appetite', 'abdominal pain', 'yellowing of eyes', '', '', '', '', '', '', '', '', '', '', ''),
(22, 'Chronic cholestasis', 'itching', 'vomiting', 'yellowish skin', 'loss of appetite', 'abdominal pain', 'yellowing of eyes', '', '', '', '', '', '', '', '', '', '', ''),
(23, 'Chronic cholestasis', 'itching', 'vomiting', 'yellowish skin', 'nausea', 'abdominal pain', 'yellowing of eyes', '', '', '', '', '', '', '', '', '', '', ''),
(24, 'Chronic cholestasis', 'itching', 'vomiting', 'yellowish skin', 'nausea', 'loss of appetite', 'yellowing of eyes', '', '', '', '', '', '', '', '', '', '', ''),
(25, 'Chronic cholestasis', 'itching', 'vomiting', 'yellowish skin', 'nausea', 'loss of appetite', 'abdominal pain', '', '', '', '', '', '', '', '', '', '', ''),
(26, 'Drug Reaction', 'itching', 'skin rash', 'stomach pain', 'burning micturition', 'spotting  urination', '', '', '', '', '', '', '', '', '', '', '', ''),
(27, 'Drug Reaction', 'itching', 'stomach pain', 'burning micturition', 'spotting  urination', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(28, 'Drug Reaction', 'itching', 'skin rash', 'burning micturition', 'spotting  urination', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(29, 'Drug Reaction', 'itching', 'skin rash', 'stomach pain', 'spotting  urination', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(30, 'Drug Reaction', 'itching', 'skin rash', 'stomach pain', 'burning micturition', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(31, 'Drug Reaction', 'skin rash', 'stomach pain', 'burning micturition', 'spotting  urination', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(32, 'Peptic ulcer diseae', 'vomiting', 'loss of appetite', 'abdominal pain', 'passage of gases', 'internal itching', '', '', '', '', '', '', '', '', '', '', '', ''),
(33, 'Peptic ulcer diseae', 'vomiting', 'indigestion', 'abdominal pain', 'passage of gases', 'internal itching', '', '', '', '', '', '', '', '', '', '', '', ''),
(34, 'Peptic ulcer diseae', 'indigestion', 'loss of appetite', 'abdominal pain', 'passage of gases', 'internal itching', '', '', '', '', '', '', '', '', '', '', '', ''),
(35, 'Peptic ulcer diseae', 'vomiting', 'indigestion', 'loss of appetite', 'passage of gases', 'internal itching', '', '', '', '', '', '', '', '', '', '', '', ''),
(36, 'Peptic ulcer diseae', 'vomiting', 'indigestion', 'loss of appetite', 'abdominal pain', 'internal itching', '', '', '', '', '', '', '', '', '', '', '', ''),
(37, 'Peptic ulcer diseae', 'vomiting', 'indigestion', 'loss of appetite', 'abdominal pain', 'passage of gases', '', '', '', '', '', '', '', '', '', '', '', ''),
(38, 'Peptic ulcer diseae', 'vomiting', 'indigestion', 'loss of appetite', 'abdominal pain', 'passage of gases', 'internal itching', '', '', '', '', '', '', '', '', '', '', ''),
(39, 'AIDS', 'muscle wasting', 'patches in throat', 'high fever', 'extra marital contacts', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(40, 'AIDS', 'patches in throat', 'high fever', 'extra marital contacts', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(41, 'AIDS', 'muscle wasting', 'high fever', 'extra marital contacts', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(42, 'AIDS', 'muscle wasting', 'patches in throat', 'extra marital contacts', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(43, 'AIDS', 'muscle wasting', 'patches in throat', 'high fever', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(44, 'Diabetes ', 'fatigue', 'weight loss', 'restlessness', 'lethargy', 'irregular sugar level', 'blurred and distorted vision', 'obesity', 'excessive hunger', 'increased appetite', 'polyuria', '', '', '', '', '', '', ''),
(45, 'Diabetes ', 'weight loss', 'restlessness', 'lethargy', 'irregular sugar level', 'blurred and distorted vision', 'obesity', 'excessive hunger', 'increased appetite', 'polyuria', '', '', '', '', '', '', '', ''),
(46, 'Diabetes ', 'fatigue', 'restlessness', 'lethargy', 'irregular sugar level', 'blurred and distorted vision', 'obesity', 'excessive hunger', 'increased appetite', 'polyuria', '', '', '', '', '', '', '', ''),
(47, 'Diabetes ', 'fatigue', 'weight loss', 'lethargy', 'irregular sugar level', 'blurred and distorted vision', 'obesity', 'excessive hunger', 'increased appetite', 'polyuria', '', '', '', '', '', '', '', ''),
(48, 'Diabetes ', 'fatigue', 'weight loss', 'restlessness', 'irregular sugar level', 'blurred and distorted vision', 'obesity', 'excessive hunger', 'increased appetite', 'polyuria', '', '', '', '', '', '', '', ''),
(49, 'Diabetes ', 'fatigue', 'weight loss', 'restlessness', 'lethargy', 'blurred and distorted vision', 'obesity', 'excessive hunger', 'increased appetite', 'polyuria', '', '', '', '', '', '', '', ''),
(50, 'Diabetes ', 'fatigue', 'weight loss', 'restlessness', 'lethargy', 'irregular sugar level', 'obesity', 'excessive hunger', 'increased appetite', 'polyuria', '', '', '', '', '', '', '', ''),
(51, 'Diabetes ', 'fatigue', 'weight loss', 'restlessness', 'lethargy', 'irregular sugar level', 'blurred and distorted vision', 'excessive hunger', 'increased appetite', 'polyuria', '', '', '', '', '', '', '', ''),
(52, 'Diabetes ', 'fatigue', 'weight loss', 'restlessness', 'lethargy', 'irregular sugar level', 'blurred and distorted vision', 'obesity', 'increased appetite', 'polyuria', '', '', '', '', '', '', '', ''),
(53, 'Gastroenteritis', 'vomiting', 'sunken eyes', 'dehydration', 'diarrhoea', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(54, 'Gastroenteritis', 'sunken eyes', 'dehydration', 'diarrhoea', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(55, 'Gastroenteritis', 'vomiting', 'dehydration', 'diarrhoea', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(56, 'Gastroenteritis', 'vomiting', 'sunken eyes', 'diarrhoea', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(57, 'Gastroenteritis', 'vomiting', 'sunken eyes', 'dehydration', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(58, 'Bronchial Asthma', 'fatigue', 'cough', 'high fever', 'breathlessness', 'family history', 'mucoid sputum', '', '', '', '', '', '', '', '', '', '', ''),
(59, 'Bronchial Asthma', 'cough', 'high fever', 'breathlessness', 'family history', 'mucoid sputum', '', '', '', '', '', '', '', '', '', '', '', ''),
(60, 'Bronchial Asthma', 'fatigue', 'high fever', 'breathlessness', 'family history', 'mucoid sputum', '', '', '', '', '', '', '', '', '', '', '', ''),
(61, 'Bronchial Asthma', 'fatigue', 'cough', 'breathlessness', 'family history', 'mucoid sputum', '', '', '', '', '', '', '', '', '', '', '', ''),
(62, 'Bronchial Asthma', 'fatigue', 'cough', 'high fever', 'family history', 'mucoid sputum', '', '', '', '', '', '', '', '', '', '', '', ''),
(63, 'Bronchial Asthma', 'fatigue', 'cough', 'high fever', 'breathlessness', 'mucoid sputum', '', '', '', '', '', '', '', '', '', '', '', ''),
(64, 'Bronchial Asthma', 'fatigue', 'cough', 'high fever', 'breathlessness', 'family history', '', '', '', '', '', '', '', '', '', '', '', ''),
(65, 'Hypertension ', 'headache', 'chest pain', 'dizziness', 'loss of balance', 'lack of concentration', '', '', '', '', '', '', '', '', '', '', '', ''),
(66, 'Hypertension ', 'chest pain', 'dizziness', 'loss of balance', 'lack of concentration', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(67, 'Hypertension ', 'headache', 'dizziness', 'loss of balance', 'lack of concentration', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(68, 'Hypertension ', 'headache', 'chest pain', 'loss of balance', 'lack of concentration', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(69, 'Hypertension ', 'headache', 'chest pain', 'dizziness', 'lack of concentration', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(70, 'Hypertension ', 'headache', 'chest pain', 'dizziness', 'loss of balance', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(71, 'Migraine', 'acidity', 'indigestion', 'headache', 'blurred and distorted vision', 'excessive hunger', 'stiff neck', 'depression', 'irritability', 'visual disturbances', '', '', '', '', '', '', '', ''),
(72, 'Migraine', 'indigestion', 'headache', 'blurred and distorted vision', 'excessive hunger', 'stiff neck', 'depression', 'irritability', 'visual disturbances', '', '', '', '', '', '', '', '', ''),
(73, 'Migraine', 'acidity', 'headache', 'blurred and distorted vision', 'excessive hunger', 'stiff neck', 'depression', 'irritability', 'visual disturbances', '', '', '', '', '', '', '', '', ''),
(74, 'Migraine', 'acidity', 'indigestion', 'blurred and distorted vision', 'excessive hunger', 'stiff neck', 'depression', 'irritability', 'visual disturbances', '', '', '', '', '', '', '', '', ''),
(75, 'Migraine', 'acidity', 'indigestion', 'headache', 'excessive hunger', 'stiff neck', 'depression', 'irritability', 'visual disturbances', '', '', '', '', '', '', '', '', ''),
(76, 'Migraine', 'acidity', 'indigestion', 'headache', 'blurred and distorted vision', 'stiff neck', 'depression', 'irritability', 'visual disturbances', '', '', '', '', '', '', '', '', ''),
(77, 'Migraine', 'acidity', 'indigestion', 'headache', 'blurred and distorted vision', 'excessive hunger', 'depression', 'irritability', 'visual disturbances', '', '', '', '', '', '', '', '', ''),
(78, 'Migraine', 'acidity', 'indigestion', 'headache', 'blurred and distorted vision', 'excessive hunger', 'stiff neck', 'irritability', 'visual disturbances', '', '', '', '', '', '', '', '', ''),
(79, 'Migraine', 'acidity', 'indigestion', 'headache', 'blurred and distorted vision', 'excessive hunger', 'stiff neck', 'depression', 'visual disturbances', '', '', '', '', '', '', '', '', ''),
(80, 'Migraine', 'acidity', 'indigestion', 'headache', 'blurred and distorted vision', 'excessive hunger', 'stiff neck', 'depression', 'irritability', '', '', '', '', '', '', '', '', ''),
(81, 'Cervical spondylosis', 'back pain', 'weakness in limbs', 'neck pain', 'dizziness', 'loss of balance', '', '', '', '', '', '', '', '', '', '', '', ''),
(82, 'Cervical spondylosis', 'weakness in limbs', 'neck pain', 'dizziness', 'loss of balance', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(83, 'Cervical spondylosis', 'back pain', 'neck pain', 'dizziness', 'loss of balance', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(84, 'Cervical spondylosis', 'back pain', 'weakness in limbs', 'dizziness', 'loss of balance', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(85, 'Cervical spondylosis', 'back pain', 'weakness in limbs', 'neck pain', 'loss of balance', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(86, 'Cervical spondylosis', 'back pain', 'weakness in limbs', 'neck pain', 'dizziness', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(87, 'Paralysis (brain hemorrhage)', 'vomiting', 'headache', 'weakness of one body side', 'altered sensorium', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(88, 'Paralysis (brain hemorrhage)', 'headache', 'weakness of one body side', 'altered sensorium', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(89, 'Paralysis (brain hemorrhage)', 'vomiting', 'weakness of one body side', 'altered sensorium', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(90, 'Paralysis (brain hemorrhage)', 'vomiting', 'headache', 'altered sensorium', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(91, 'Paralysis (brain hemorrhage)', 'vomiting', 'headache', 'weakness of one body side', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(92, 'Jaundice', 'itching', 'vomiting', 'fatigue', 'weight loss', 'high fever', 'yellowish skin', 'dark urine', 'abdominal pain', '', '', '', '', '', '', '', '', ''),
(93, 'Jaundice', 'vomiting', 'fatigue', 'weight loss', 'high fever', 'yellowish skin', 'dark urine', 'abdominal pain', '', '', '', '', '', '', '', '', '', ''),
(94, 'Jaundice', 'itching', 'fatigue', 'weight loss', 'high fever', 'yellowish skin', 'dark urine', 'abdominal pain', '', '', '', '', '', '', '', '', '', ''),
(95, 'Jaundice', 'itching', 'vomiting', 'weight loss', 'high fever', 'yellowish skin', 'dark urine', 'abdominal pain', '', '', '', '', '', '', '', '', '', ''),
(96, 'Jaundice', 'itching', 'vomiting', 'fatigue', 'high fever', 'yellowish skin', 'dark urine', 'abdominal pain', '', '', '', '', '', '', '', '', '', ''),
(97, 'Jaundice', 'itching', 'vomiting', 'fatigue', 'weight loss', 'yellowish skin', 'dark urine', 'abdominal pain', '', '', '', '', '', '', '', '', '', ''),
(98, 'Jaundice', 'itching', 'vomiting', 'fatigue', 'weight loss', 'high fever', 'dark urine', 'abdominal pain', '', '', '', '', '', '', '', '', '', ''),
(99, 'Jaundice', 'itching', 'vomiting', 'fatigue', 'weight loss', 'high fever', 'yellowish skin', 'abdominal pain', '', '', '', '', '', '', '', '', '', ''),
(100, 'Jaundice', 'itching', 'vomiting', 'fatigue', 'weight loss', 'high fever', 'yellowish skin', 'dark urine', '', '', '', '', '', '', '', '', '', ''),
(101, 'Malaria', 'chills', 'vomiting', 'high fever', 'sweating', 'headache', 'nausea', 'muscle pain', '', '', '', '', '', '', '', '', '', ''),
(102, 'Malaria', 'chills', 'vomiting', 'high fever', 'sweating', 'headache', 'nausea', 'diarrhoea', 'muscle pain', '', '', '', '', '', '', '', '', ''),
(103, 'Malaria', 'vomiting', 'high fever', 'sweating', 'headache', 'nausea', 'diarrhoea', 'muscle pain', '', '', '', '', '', '', '', '', '', ''),
(104, 'Malaria', 'chills', 'high fever', 'sweating', 'headache', 'nausea', 'diarrhoea', 'muscle pain', '', '', '', '', '', '', '', '', '', ''),
(105, 'Malaria', 'chills', 'vomiting', 'sweating', 'headache', 'nausea', 'diarrhoea', 'muscle pain', '', '', '', '', '', '', '', '', '', ''),
(106, 'Malaria', 'chills', 'vomiting', 'high fever', 'headache', 'nausea', 'diarrhoea', 'muscle pain', '', '', '', '', '', '', '', '', '', ''),
(107, 'Malaria', 'chills', 'vomiting', 'high fever', 'sweating', 'nausea', 'diarrhoea', 'muscle pain', '', '', '', '', '', '', '', '', '', ''),
(108, 'Malaria', 'chills', 'vomiting', 'high fever', 'sweating', 'headache', 'diarrhoea', 'muscle pain', '', '', '', '', '', '', '', '', '', ''),
(109, 'Chicken pox', 'itching', 'skin rash', 'fatigue', 'lethargy', 'high fever', 'headache', 'loss of appetite', 'mild fever', 'swelled lymph nodes', 'malaise', 'red spots over body', '', '', '', '', '', ''),
(110, 'Chicken pox', 'skin rash', 'fatigue', 'lethargy', 'high fever', 'headache', 'loss of appetite', 'mild fever', 'swelled lymph nodes', 'malaise', 'red spots over body', '', '', '', '', '', '', ''),
(111, 'Chicken pox', 'itching', 'fatigue', 'lethargy', 'high fever', 'headache', 'loss of appetite', 'mild fever', 'swelled lymph nodes', 'malaise', 'red spots over body', '', '', '', '', '', '', ''),
(112, 'Chicken pox', 'itching', 'skin rash', 'lethargy', 'high fever', 'headache', 'loss of appetite', 'mild fever', 'swelled lymph nodes', 'malaise', 'red spots over body', '', '', '', '', '', '', ''),
(113, 'Chicken pox', 'itching', 'skin rash', 'fatigue', 'high fever', 'headache', 'loss of appetite', 'mild fever', 'swelled lymph nodes', 'malaise', 'red spots over body', '', '', '', '', '', '', ''),
(114, 'Chicken pox', 'itching', 'skin rash', 'fatigue', 'lethargy', 'headache', 'loss of appetite', 'mild fever', 'swelled lymph nodes', 'malaise', 'red spots over body', '', '', '', '', '', '', ''),
(115, 'Chicken pox', 'itching', 'skin rash', 'fatigue', 'lethargy', 'high fever', 'loss of appetite', 'mild fever', 'swelled lymph nodes', 'malaise', 'red spots over body', '', '', '', '', '', '', ''),
(116, 'Chicken pox', 'itching', 'skin rash', 'fatigue', 'lethargy', 'high fever', 'headache', 'mild fever', 'swelled lymph nodes', 'malaise', 'red spots over body', '', '', '', '', '', '', ''),
(117, 'Chicken pox', 'itching', 'skin rash', 'fatigue', 'lethargy', 'high fever', 'headache', 'loss of appetite', 'swelled lymph nodes', 'malaise', 'red spots over body', '', '', '', '', '', '', ''),
(118, 'Chicken pox', 'itching', 'skin rash', 'fatigue', 'lethargy', 'high fever', 'headache', 'loss of appetite', 'mild fever', 'malaise', 'red spots over body', '', '', '', '', '', '', ''),
(119, 'Dengue', 'skin rash', 'chills', 'joint pain', 'vomiting', 'fatigue', 'high fever', 'headache', 'nausea', 'loss of appetite', 'pain behind the eyes', 'back pain', 'muscle pain', 'red spots over body', '', '', '', ''),
(120, 'Dengue', 'skin rash', 'chills', 'joint pain', 'vomiting', 'fatigue', 'high fever', 'headache', 'nausea', 'loss of appetite', 'pain behind the eyes', 'back pain', 'malaise', 'red spots over body', '', '', '', ''),
(121, 'Dengue', 'skin rash', 'chills', 'joint pain', 'vomiting', 'fatigue', 'high fever', 'headache', 'nausea', 'loss of appetite', 'pain behind the eyes', 'back pain', 'malaise', 'muscle pain', '', '', '', ''),
(122, 'Dengue', 'skin rash', 'chills', 'joint pain', 'vomiting', 'fatigue', 'high fever', 'headache', 'nausea', 'loss of appetite', 'pain behind the eyes', 'back pain', 'malaise', 'muscle pain', 'red spots over body', '', '', ''),
(123, 'Dengue', 'chills', 'joint pain', 'vomiting', 'fatigue', 'high fever', 'headache', 'nausea', 'loss of appetite', 'pain behind the eyes', 'back pain', 'malaise', 'muscle pain', 'red spots over body', '', '', '', ''),
(124, 'Dengue', 'skin rash', 'joint pain', 'vomiting', 'fatigue', 'high fever', 'headache', 'nausea', 'loss of appetite', 'pain behind the eyes', 'back pain', 'malaise', 'muscle pain', 'red spots over body', '', '', '', ''),
(125, 'Dengue', 'skin rash', 'chills', 'vomiting', 'fatigue', 'high fever', 'headache', 'nausea', 'loss of appetite', 'pain behind the eyes', 'back pain', 'malaise', 'muscle pain', 'red spots over body', '', '', '', ''),
(126, 'Dengue', 'skin rash', 'chills', 'joint pain', 'fatigue', 'high fever', 'headache', 'nausea', 'loss of appetite', 'pain behind the eyes', 'back pain', 'malaise', 'muscle pain', 'red spots over body', '', '', '', ''),
(127, 'Dengue', 'skin rash', 'chills', 'joint pain', 'vomiting', 'high fever', 'headache', 'nausea', 'loss of appetite', 'pain behind the eyes', 'back pain', 'malaise', 'muscle pain', 'red spots over body', '', '', '', ''),
(128, 'Dengue', 'skin rash', 'chills', 'joint pain', 'vomiting', 'fatigue', 'headache', 'nausea', 'loss of appetite', 'pain behind the eyes', 'back pain', 'malaise', 'muscle pain', 'red spots over body', '', '', '', ''),
(129, 'Typhoid', 'chills', 'vomiting', 'fatigue', 'high fever', 'nausea', 'constipation', 'abdominal pain', 'diarrhoea', 'toxic look (typhos)', 'belly pain', '', '', '', '', '', '', ''),
(130, 'Typhoid', 'chills', 'vomiting', 'fatigue', 'high fever', 'headache', 'constipation', 'abdominal pain', 'diarrhoea', 'toxic look (typhos)', 'belly pain', '', '', '', '', '', '', ''),
(131, 'Typhoid', 'chills', 'vomiting', 'fatigue', 'high fever', 'headache', 'nausea', 'abdominal pain', 'diarrhoea', 'toxic look (typhos)', 'belly pain', '', '', '', '', '', '', ''),
(132, 'Typhoid', 'chills', 'vomiting', 'fatigue', 'high fever', 'headache', 'nausea', 'constipation', 'diarrhoea', 'toxic look (typhos)', 'belly pain', '', '', '', '', '', '', ''),
(133, 'Typhoid', 'chills', 'vomiting', 'fatigue', 'high fever', 'headache', 'nausea', 'constipation', 'abdominal pain', 'toxic look (typhos)', 'belly pain', '', '', '', '', '', '', ''),
(134, 'Typhoid', 'chills', 'vomiting', 'fatigue', 'high fever', 'headache', 'nausea', 'constipation', 'abdominal pain', 'diarrhoea', 'belly pain', '', '', '', '', '', '', ''),
(135, 'Typhoid', 'chills', 'vomiting', 'fatigue', 'high fever', 'headache', 'nausea', 'constipation', 'abdominal pain', 'diarrhoea', 'toxic look (typhos)', '', '', '', '', '', '', ''),
(136, 'Typhoid', 'chills', 'vomiting', 'fatigue', 'high fever', 'headache', 'nausea', 'constipation', 'abdominal pain', 'diarrhoea', 'toxic look (typhos)', 'belly pain', '', '', '', '', '', ''),
(137, 'Typhoid', 'chills', 'fatigue', 'high fever', 'headache', 'nausea', 'constipation', 'abdominal pain', 'diarrhoea', 'toxic look (typhos)', 'belly pain', '', '', '', '', '', '', ''),
(138, 'Hepatitis A', 'joint pain', 'vomiting', 'yellowish skin', 'dark urine', 'nausea', 'loss of appetite', 'abdominal pain', 'diarrhoea', 'mild fever', 'yellowing of eyes', 'muscle pain', '', '', '', '', '', ''),
(139, 'Hepatitis A', 'vomiting', 'yellowish skin', 'dark urine', 'nausea', 'loss of appetite', 'abdominal pain', 'diarrhoea', 'mild fever', 'yellowing of eyes', 'muscle pain', '', '', '', '', '', '', ''),
(140, 'Hepatitis A', 'joint pain', 'yellowish skin', 'dark urine', 'nausea', 'loss of appetite', 'abdominal pain', 'diarrhoea', 'mild fever', 'yellowing of eyes', 'muscle pain', '', '', '', '', '', '', ''),
(141, 'Hepatitis A', 'joint pain', 'vomiting', 'dark urine', 'nausea', 'loss of appetite', 'abdominal pain', 'diarrhoea', 'mild fever', 'yellowing of eyes', 'muscle pain', '', '', '', '', '', '', ''),
(142, 'Hepatitis A', 'joint pain', 'vomiting', 'yellowish skin', 'nausea', 'loss of appetite', 'abdominal pain', 'diarrhoea', 'mild fever', 'yellowing of eyes', 'muscle pain', '', '', '', '', '', '', ''),
(143, 'Hepatitis A', 'joint pain', 'vomiting', 'yellowish skin', 'dark urine', 'loss of appetite', 'abdominal pain', 'diarrhoea', 'mild fever', 'yellowing of eyes', 'muscle pain', '', '', '', '', '', '', ''),
(144, 'Hepatitis A', 'joint pain', 'vomiting', 'yellowish skin', 'dark urine', 'nausea', 'abdominal pain', 'diarrhoea', 'mild fever', 'yellowing of eyes', 'muscle pain', '', '', '', '', '', '', ''),
(145, 'Hepatitis A', 'joint pain', 'vomiting', 'yellowish skin', 'dark urine', 'nausea', 'loss of appetite', 'diarrhoea', 'mild fever', 'yellowing of eyes', 'muscle pain', '', '', '', '', '', '', ''),
(146, 'Hepatitis A', 'joint pain', 'vomiting', 'yellowish skin', 'dark urine', 'nausea', 'loss of appetite', 'abdominal pain', 'mild fever', 'yellowing of eyes', 'muscle pain', '', '', '', '', '', '', ''),
(147, 'Hepatitis B', 'itching', 'fatigue', 'lethargy', 'yellowish skin', 'dark urine', 'loss of appetite', 'abdominal pain', 'yellow urine', 'yellowing of eyes', 'malaise', 'receiving blood transfusion', 'receiving unsterile injections', '', '', '', '', ''),
(148, 'Hepatitis B', 'fatigue', 'lethargy', 'yellowish skin', 'dark urine', 'loss of appetite', 'abdominal pain', 'yellow urine', 'yellowing of eyes', 'malaise', 'receiving blood transfusion', 'receiving unsterile injections', '', '', '', '', '', ''),
(149, 'Hepatitis B', 'itching', 'lethargy', 'yellowish skin', 'dark urine', 'loss of appetite', 'abdominal pain', 'yellow urine', 'yellowing of eyes', 'malaise', 'receiving blood transfusion', 'receiving unsterile injections', '', '', '', '', '', ''),
(150, 'Hepatitis B', 'itching', 'fatigue', 'yellowish skin', 'dark urine', 'loss of appetite', 'abdominal pain', 'yellow urine', 'yellowing of eyes', 'malaise', 'receiving blood transfusion', 'receiving unsterile injections', '', '', '', '', '', ''),
(151, 'Hepatitis B', 'itching', 'fatigue', 'lethargy', 'dark urine', 'loss of appetite', 'abdominal pain', 'yellow urine', 'yellowing of eyes', 'malaise', 'receiving blood transfusion', 'receiving unsterile injections', '', '', '', '', '', ''),
(152, 'Hepatitis B', 'itching', 'fatigue', 'lethargy', 'yellowish skin', 'loss of appetite', 'abdominal pain', 'yellow urine', 'yellowing of eyes', 'malaise', 'receiving blood transfusion', 'receiving unsterile injections', '', '', '', '', '', ''),
(153, 'Hepatitis B', 'itching', 'fatigue', 'lethargy', 'yellowish skin', 'dark urine', 'abdominal pain', 'yellow urine', 'yellowing of eyes', 'malaise', 'receiving blood transfusion', 'receiving unsterile injections', '', '', '', '', '', ''),
(154, 'Hepatitis B', 'itching', 'fatigue', 'lethargy', 'yellowish skin', 'dark urine', 'loss of appetite', 'yellow urine', 'yellowing of eyes', 'malaise', 'receiving blood transfusion', 'receiving unsterile injections', '', '', '', '', '', ''),
(155, 'Hepatitis B', 'itching', 'fatigue', 'lethargy', 'yellowish skin', 'dark urine', 'loss of appetite', 'abdominal pain', 'yellowing of eyes', 'malaise', 'receiving blood transfusion', 'receiving unsterile injections', '', '', '', '', '', ''),
(156, 'Hepatitis C', 'fatigue', 'yellowish skin', 'nausea', 'loss of appetite', 'family history', '', '', '', '', '', '', '', '', '', '', '', ''),
(157, 'Hepatitis C', 'fatigue', 'yellowish skin', 'nausea', 'loss of appetite', 'yellowing of eyes', 'family history', '', '', '', '', '', '', '', '', '', '', ''),
(158, 'Hepatitis C', 'yellowish skin', 'nausea', 'loss of appetite', 'yellowing of eyes', 'family history', '', '', '', '', '', '', '', '', '', '', '', ''),
(159, 'Hepatitis C', 'fatigue', 'nausea', 'loss of appetite', 'yellowing of eyes', 'family history', '', '', '', '', '', '', '', '', '', '', '', ''),
(160, 'Hepatitis C', 'fatigue', 'yellowish skin', 'loss of appetite', 'yellowing of eyes', 'family history', '', '', '', '', '', '', '', '', '', '', '', ''),
(161, 'Hepatitis C', 'fatigue', 'yellowish skin', 'nausea', 'yellowing of eyes', 'family history', '', '', '', '', '', '', '', '', '', '', '', ''),
(162, 'Hepatitis C', 'fatigue', 'yellowish skin', 'nausea', 'loss of appetite', 'yellowing of eyes', '', '', '', '', '', '', '', '', '', '', '', ''),
(163, 'Hepatitis D', 'joint pain', 'vomiting', 'fatigue', 'yellowish skin', 'dark urine', 'nausea', 'loss of appetite', 'abdominal pain', 'yellowing of eyes', '', '', '', '', '', '', '', ''),
(164, 'Hepatitis D', 'vomiting', 'fatigue', 'yellowish skin', 'dark urine', 'nausea', 'loss of appetite', 'abdominal pain', 'yellowing of eyes', '', '', '', '', '', '', '', '', ''),
(165, 'Hepatitis D', 'joint pain', 'fatigue', 'yellowish skin', 'dark urine', 'nausea', 'loss of appetite', 'abdominal pain', 'yellowing of eyes', '', '', '', '', '', '', '', '', ''),
(166, 'Hepatitis D', 'joint pain', 'vomiting', 'yellowish skin', 'dark urine', 'nausea', 'loss of appetite', 'abdominal pain', 'yellowing of eyes', '', '', '', '', '', '', '', '', ''),
(167, 'Hepatitis D', 'joint pain', 'vomiting', 'fatigue', 'dark urine', 'nausea', 'loss of appetite', 'abdominal pain', 'yellowing of eyes', '', '', '', '', '', '', '', '', ''),
(168, 'Hepatitis D', 'joint pain', 'vomiting', 'fatigue', 'yellowish skin', 'nausea', 'loss of appetite', 'abdominal pain', 'yellowing of eyes', '', '', '', '', '', '', '', '', ''),
(169, 'Hepatitis D', 'joint pain', 'vomiting', 'fatigue', 'yellowish skin', 'dark urine', 'loss of appetite', 'abdominal pain', 'yellowing of eyes', '', '', '', '', '', '', '', '', ''),
(170, 'Hepatitis D', 'joint pain', 'vomiting', 'fatigue', 'yellowish skin', 'dark urine', 'nausea', 'abdominal pain', 'yellowing of eyes', '', '', '', '', '', '', '', '', ''),
(171, 'Hepatitis D', 'joint pain', 'vomiting', 'fatigue', 'yellowish skin', 'dark urine', 'nausea', 'loss of appetite', 'yellowing of eyes', '', '', '', '', '', '', '', '', ''),
(172, 'Hepatitis D', 'joint pain', 'vomiting', 'fatigue', 'yellowish skin', 'dark urine', 'nausea', 'loss of appetite', 'abdominal pain', '', '', '', '', '', '', '', '', ''),
(173, 'Hepatitis E', 'joint pain', 'vomiting', 'fatigue', 'high fever', 'yellowish skin', 'dark urine', 'nausea', 'loss of appetite', 'abdominal pain', 'yellowing of eyes', 'coma', 'stomach bleeding', '', '', '', '', ''),
(174, 'Hepatitis E', 'joint pain', 'vomiting', 'fatigue', 'high fever', 'yellowish skin', 'dark urine', 'nausea', 'loss of appetite', 'abdominal pain', 'yellowing of eyes', 'acute liver failure', 'coma', 'stomach bleeding', '', '', '', ''),
(175, 'Hepatitis E', 'vomiting', 'fatigue', 'high fever', 'yellowish skin', 'dark urine', 'nausea', 'loss of appetite', 'abdominal pain', 'yellowing of eyes', 'acute liver failure', 'coma', 'stomach bleeding', '', '', '', '', ''),
(176, 'Hepatitis E', 'joint pain', 'fatigue', 'high fever', 'yellowish skin', 'dark urine', 'nausea', 'loss of appetite', 'abdominal pain', 'yellowing of eyes', 'acute liver failure', 'coma', 'stomach bleeding', '', '', '', '', ''),
(177, 'Hepatitis E', 'joint pain', 'vomiting', 'high fever', 'yellowish skin', 'dark urine', 'nausea', 'loss of appetite', 'abdominal pain', 'yellowing of eyes', 'acute liver failure', 'coma', 'stomach bleeding', '', '', '', '', ''),
(178, 'Hepatitis E', 'joint pain', 'vomiting', 'fatigue', 'yellowish skin', 'dark urine', 'nausea', 'loss of appetite', 'abdominal pain', 'yellowing of eyes', 'acute liver failure', 'coma', 'stomach bleeding', '', '', '', '', ''),
(179, 'Hepatitis E', 'joint pain', 'vomiting', 'fatigue', 'high fever', 'dark urine', 'nausea', 'loss of appetite', 'abdominal pain', 'yellowing of eyes', 'acute liver failure', 'coma', 'stomach bleeding', '', '', '', '', ''),
(180, 'Hepatitis E', 'joint pain', 'vomiting', 'fatigue', 'high fever', 'yellowish skin', 'nausea', 'loss of appetite', 'abdominal pain', 'yellowing of eyes', 'acute liver failure', 'coma', 'stomach bleeding', '', '', '', '', ''),
(181, 'Hepatitis E', 'joint pain', 'vomiting', 'fatigue', 'high fever', 'yellowish skin', 'dark urine', 'loss of appetite', 'abdominal pain', 'yellowing of eyes', 'acute liver failure', 'coma', 'stomach bleeding', '', '', '', '', ''),
(182, 'Alcoholic hepatitis', 'vomiting', 'yellowish skin', 'abdominal pain', 'swelling of stomach', 'distention of abdomen', 'history of alcohol consumption', 'fluid overload', '', '', '', '', '', '', '', '', '', ''),
(183, 'Alcoholic hepatitis', 'yellowish skin', 'abdominal pain', 'swelling of stomach', 'distention of abdomen', 'history of alcohol consumption', 'fluid overload', '', '', '', '', '', '', '', '', '', '', ''),
(184, 'Alcoholic hepatitis', 'vomiting', 'abdominal pain', 'swelling of stomach', 'distention of abdomen', 'history of alcohol consumption', 'fluid overload', '', '', '', '', '', '', '', '', '', '', ''),
(185, 'Alcoholic hepatitis', 'vomiting', 'yellowish skin', 'swelling of stomach', 'distention of abdomen', 'history of alcohol consumption', 'fluid overload', '', '', '', '', '', '', '', '', '', '', ''),
(186, 'Alcoholic hepatitis', 'vomiting', 'yellowish skin', 'abdominal pain', 'distention of abdomen', 'history of alcohol consumption', 'fluid overload', '', '', '', '', '', '', '', '', '', '', ''),
(187, 'Alcoholic hepatitis', 'vomiting', 'yellowish skin', 'abdominal pain', 'swelling of stomach', 'history of alcohol consumption', 'fluid overload', '', '', '', '', '', '', '', '', '', '', ''),
(188, 'Alcoholic hepatitis', 'vomiting', 'yellowish skin', 'abdominal pain', 'swelling of stomach', 'distention of abdomen', 'fluid overload', '', '', '', '', '', '', '', '', '', '', ''),
(189, 'Alcoholic hepatitis', 'vomiting', 'yellowish skin', 'abdominal pain', 'swelling of stomach', 'distention of abdomen', 'history of alcohol consumption', '', '', '', '', '', '', '', '', '', '', ''),
(190, 'Tuberculosis', 'chills', 'vomiting', 'fatigue', 'weight loss', 'cough', 'high fever', 'breathlessness', 'sweating', 'loss of appetite', 'mild fever', 'yellowing of eyes', 'swelled lymph nodes', 'malaise', 'phlegm', 'chest pain', 'blood in sputum', ''),
(191, 'Tuberculosis', 'vomiting', 'fatigue', 'weight loss', 'cough', 'high fever', 'breathlessness', 'sweating', 'loss of appetite', 'mild fever', 'yellowing of eyes', 'swelled lymph nodes', 'malaise', 'phlegm', 'chest pain', 'blood in sputum', '', ''),
(192, 'Tuberculosis', 'chills', 'fatigue', 'weight loss', 'cough', 'high fever', 'breathlessness', 'sweating', 'loss of appetite', 'mild fever', 'yellowing of eyes', 'swelled lymph nodes', 'malaise', 'phlegm', 'chest pain', 'blood in sputum', '', ''),
(193, 'Tuberculosis', 'chills', 'vomiting', 'weight loss', 'cough', 'high fever', 'breathlessness', 'sweating', 'loss of appetite', 'mild fever', 'yellowing of eyes', 'swelled lymph nodes', 'malaise', 'phlegm', 'chest pain', 'blood in sputum', '', ''),
(194, 'Tuberculosis', 'chills', 'vomiting', 'fatigue', 'cough', 'high fever', 'breathlessness', 'sweating', 'loss of appetite', 'mild fever', 'yellowing of eyes', 'swelled lymph nodes', 'malaise', 'phlegm', 'chest pain', 'blood in sputum', '', ''),
(195, 'Tuberculosis', 'chills', 'vomiting', 'fatigue', 'weight loss', 'high fever', 'breathlessness', 'sweating', 'loss of appetite', 'mild fever', 'yellowing of eyes', 'swelled lymph nodes', 'malaise', 'phlegm', 'chest pain', 'blood in sputum', '', ''),
(196, 'Tuberculosis', 'chills', 'vomiting', 'fatigue', 'weight loss', 'cough', 'breathlessness', 'sweating', 'loss of appetite', 'mild fever', 'yellowing of eyes', 'swelled lymph nodes', 'malaise', 'phlegm', 'chest pain', 'blood in sputum', '', ''),
(197, 'Tuberculosis', 'chills', 'vomiting', 'fatigue', 'weight loss', 'cough', 'high fever', 'sweating', 'loss of appetite', 'mild fever', 'yellowing of eyes', 'swelled lymph nodes', 'malaise', 'phlegm', 'chest pain', 'blood in sputum', '', ''),
(198, 'Tuberculosis', 'chills', 'vomiting', 'fatigue', 'weight loss', 'cough', 'high fever', 'breathlessness', 'loss of appetite', 'mild fever', 'yellowing of eyes', 'swelled lymph nodes', 'malaise', 'phlegm', 'chest pain', 'blood in sputum', '', ''),
(199, 'Common Cold', 'continuous sneezing', 'chills', 'fatigue', 'cough', 'high fever', 'headache', 'swelled lymph nodes', 'malaise', 'phlegm', 'throat irritation', 'redness of eyes', 'sinus pressure', 'runny nose', 'congestion', 'chest pain', 'loss of smell', 'muscle pain'),
(200, 'Common Cold', 'chills', 'fatigue', 'cough', 'high fever', 'headache', 'swelled lymph nodes', 'malaise', 'phlegm', 'throat irritation', 'redness of eyes', 'sinus pressure', 'runny nose', 'congestion', 'chest pain', 'loss of smell', 'muscle pain', ''),
(201, 'Common Cold', 'continuous sneezing', 'fatigue', 'cough', 'high fever', 'headache', 'swelled lymph nodes', 'malaise', 'phlegm', 'throat irritation', 'redness of eyes', 'sinus pressure', 'runny nose', 'congestion', 'chest pain', 'loss of smell', 'muscle pain', ''),
(202, 'Common Cold', 'continuous sneezing', 'chills', 'cough', 'high fever', 'headache', 'swelled lymph nodes', 'malaise', 'phlegm', 'throat irritation', 'redness of eyes', 'sinus pressure', 'runny nose', 'congestion', 'chest pain', 'loss of smell', 'muscle pain', ''),
(203, 'Common Cold', 'continuous sneezing', 'chills', 'fatigue', 'high fever', 'headache', 'swelled lymph nodes', 'malaise', 'phlegm', 'throat irritation', 'redness of eyes', 'sinus pressure', 'runny nose', 'congestion', 'chest pain', 'loss of smell', 'muscle pain', ''),
(204, 'Common Cold', 'continuous sneezing', 'chills', 'fatigue', 'cough', 'headache', 'swelled lymph nodes', 'malaise', 'phlegm', 'throat irritation', 'redness of eyes', 'sinus pressure', 'runny nose', 'congestion', 'chest pain', 'loss of smell', 'muscle pain', ''),
(205, 'Common Cold', 'continuous sneezing', 'chills', 'fatigue', 'cough', 'high fever', 'swelled lymph nodes', 'malaise', 'phlegm', 'throat irritation', 'redness of eyes', 'sinus pressure', 'runny nose', 'congestion', 'chest pain', 'loss of smell', 'muscle pain', ''),
(206, 'Common Cold', 'continuous sneezing', 'chills', 'fatigue', 'cough', 'high fever', 'headache', 'malaise', 'phlegm', 'throat irritation', 'redness of eyes', 'sinus pressure', 'runny nose', 'congestion', 'chest pain', 'loss of smell', 'muscle pain', ''),
(207, 'Common Cold', 'continuous sneezing', 'chills', 'fatigue', 'cough', 'high fever', 'headache', 'swelled lymph nodes', 'phlegm', 'throat irritation', 'redness of eyes', 'sinus pressure', 'runny nose', 'congestion', 'chest pain', 'loss of smell', 'muscle pain', ''),
(208, 'Pneumonia', 'chills', 'fatigue', 'cough', 'high fever', 'breathlessness', 'sweating', 'malaise', 'chest pain', 'fast heart rate', 'rusty sputum', '', '', '', '', '', '', ''),
(209, 'Pneumonia', 'chills', 'fatigue', 'cough', 'high fever', 'breathlessness', 'sweating', 'malaise', 'phlegm', 'chest pain', 'fast heart rate', 'rusty sputum', '', '', '', '', '', ''),
(210, 'Pneumonia', 'fatigue', 'cough', 'high fever', 'breathlessness', 'sweating', 'malaise', 'phlegm', 'chest pain', 'fast heart rate', 'rusty sputum', '', '', '', '', '', '', ''),
(211, 'Pneumonia', 'chills', 'cough', 'high fever', 'breathlessness', 'sweating', 'malaise', 'phlegm', 'chest pain', 'fast heart rate', 'rusty sputum', '', '', '', '', '', '', ''),
(212, 'Pneumonia', 'chills', 'fatigue', 'high fever', 'breathlessness', 'sweating', 'malaise', 'phlegm', 'chest pain', 'fast heart rate', 'rusty sputum', '', '', '', '', '', '', ''),
(213, 'Pneumonia', 'chills', 'fatigue', 'cough', 'breathlessness', 'sweating', 'malaise', 'phlegm', 'chest pain', 'fast heart rate', 'rusty sputum', '', '', '', '', '', '', ''),
(214, 'Pneumonia', 'chills', 'fatigue', 'cough', 'high fever', 'sweating', 'malaise', 'phlegm', 'chest pain', 'fast heart rate', 'rusty sputum', '', '', '', '', '', '', ''),
(215, 'Pneumonia', 'chills', 'fatigue', 'cough', 'high fever', 'breathlessness', 'malaise', 'phlegm', 'chest pain', 'fast heart rate', 'rusty sputum', '', '', '', '', '', '', ''),
(216, 'Pneumonia', 'chills', 'fatigue', 'cough', 'high fever', 'breathlessness', 'sweating', 'phlegm', 'chest pain', 'fast heart rate', 'rusty sputum', '', '', '', '', '', '', ''),
(217, 'Dimorphic hemmorhoids(piles)', 'constipation', 'pain during bowel movements', 'pain in anal region', 'bloody stool', 'irritation in anus', '', '', '', '', '', '', '', '', '', '', '', ''),
(218, 'Dimorphic hemmorhoids(piles)', 'pain during bowel movements', 'pain in anal region', 'bloody stool', 'irritation in anus', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(219, 'Dimorphic hemmorhoids(piles)', 'constipation', 'pain in anal region', 'bloody stool', 'irritation in anus', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(220, 'Dimorphic hemmorhoids(piles)', 'constipation', 'pain during bowel movements', 'bloody stool', 'irritation in anus', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(221, 'Dimorphic hemmorhoids(piles)', 'constipation', 'pain during bowel movements', 'pain in anal region', 'irritation in anus', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(222, 'Dimorphic hemmorhoids(piles)', 'constipation', 'pain during bowel movements', 'pain in anal region', 'bloody stool', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(223, 'Heart attack', 'vomiting', 'breathlessness', 'sweating', 'chest pain', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(224, 'Heart attack', 'breathlessness', 'sweating', 'chest pain', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(225, 'Heart attack', 'vomiting', 'sweating', 'chest pain', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(226, 'Heart attack', 'vomiting', 'breathlessness', 'chest pain', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(227, 'Heart attack', 'vomiting', 'breathlessness', 'sweating', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(228, 'Varicose veins', 'fatigue', 'cramps', 'bruising', 'obesity', 'swollen legs', 'swollen blood vessels', 'prominent veins on calf', '', '', '', '', '', '', '', '', '', ''),
(229, 'Varicose veins', 'cramps', 'bruising', 'obesity', 'swollen legs', 'swollen blood vessels', 'prominent veins on calf', '', '', '', '', '', '', '', '', '', '', ''),
(230, 'Varicose veins', 'fatigue', 'bruising', 'obesity', 'swollen legs', 'swollen blood vessels', 'prominent veins on calf', '', '', '', '', '', '', '', '', '', '', ''),
(231, 'Varicose veins', 'fatigue', 'cramps', 'obesity', 'swollen legs', 'swollen blood vessels', 'prominent veins on calf', '', '', '', '', '', '', '', '', '', '', ''),
(232, 'Varicose veins', 'fatigue', 'cramps', 'bruising', 'swollen legs', 'swollen blood vessels', 'prominent veins on calf', '', '', '', '', '', '', '', '', '', '', ''),
(233, 'Varicose veins', 'fatigue', 'cramps', 'bruising', 'obesity', 'swollen blood vessels', 'prominent veins on calf', '', '', '', '', '', '', '', '', '', '', ''),
(234, 'Varicose veins', 'fatigue', 'cramps', 'bruising', 'obesity', 'swollen legs', 'prominent veins on calf', '', '', '', '', '', '', '', '', '', '', ''),
(235, 'Varicose veins', 'fatigue', 'cramps', 'bruising', 'obesity', 'swollen legs', 'swollen blood vessels', '', '', '', '', '', '', '', '', '', '', ''),
(236, 'Hypothyroidism', 'fatigue', 'weight gain', 'cold hands and feets', 'mood swings', 'lethargy', 'dizziness', 'puffy face and eyes', 'enlarged thyroid', 'brittle nails', 'swollen extremeties', 'depression', 'irritability', 'abnormal menstruation', '', '', '', ''),
(237, 'Hypothyroidism', 'weight gain', 'cold hands and feets', 'mood swings', 'lethargy', 'dizziness', 'puffy face and eyes', 'enlarged thyroid', 'brittle nails', 'swollen extremeties', 'depression', 'irritability', 'abnormal menstruation', '', '', '', '', ''),
(238, 'Hypothyroidism', 'fatigue', 'cold hands and feets', 'mood swings', 'lethargy', 'dizziness', 'puffy face and eyes', 'enlarged thyroid', 'brittle nails', 'swollen extremeties', 'depression', 'irritability', 'abnormal menstruation', '', '', '', '', ''),
(239, 'Hypothyroidism', 'fatigue', 'weight gain', 'mood swings', 'lethargy', 'dizziness', 'puffy face and eyes', 'enlarged thyroid', 'brittle nails', 'swollen extremeties', 'depression', 'irritability', 'abnormal menstruation', '', '', '', '', ''),
(240, 'Hypothyroidism', 'fatigue', 'weight gain', 'cold hands and feets', 'lethargy', 'dizziness', 'puffy face and eyes', 'enlarged thyroid', 'brittle nails', 'swollen extremeties', 'depression', 'irritability', 'abnormal menstruation', '', '', '', '', ''),
(241, 'Hypothyroidism', 'fatigue', 'weight gain', 'cold hands and feets', 'mood swings', 'dizziness', 'puffy face and eyes', 'enlarged thyroid', 'brittle nails', 'swollen extremeties', 'depression', 'irritability', 'abnormal menstruation', '', '', '', '', ''),
(242, 'Hypothyroidism', 'fatigue', 'weight gain', 'cold hands and feets', 'mood swings', 'lethargy', 'puffy face and eyes', 'enlarged thyroid', 'brittle nails', 'swollen extremeties', 'depression', 'irritability', 'abnormal menstruation', '', '', '', '', ''),
(243, 'Hypothyroidism', 'fatigue', 'weight gain', 'cold hands and feets', 'mood swings', 'lethargy', 'dizziness', 'enlarged thyroid', 'brittle nails', 'swollen extremeties', 'depression', 'irritability', 'abnormal menstruation', '', '', '', '', ''),
(244, 'Hyperthyroidism', 'fatigue', 'mood swings', 'weight loss', 'restlessness', 'sweating', 'diarrhoea', 'fast heart rate', 'excessive hunger', 'muscle weakness', 'irritability', 'abnormal menstruation', '', '', '', '', '', ''),
(245, 'Hyperthyroidism', 'mood swings', 'weight loss', 'restlessness', 'sweating', 'diarrhoea', 'fast heart rate', 'excessive hunger', 'muscle weakness', 'irritability', 'abnormal menstruation', '', '', '', '', '', '', ''),
(246, 'Hyperthyroidism', 'fatigue', 'weight loss', 'restlessness', 'sweating', 'diarrhoea', 'fast heart rate', 'excessive hunger', 'muscle weakness', 'irritability', 'abnormal menstruation', '', '', '', '', '', '', ''),
(247, 'Hyperthyroidism', 'fatigue', 'mood swings', 'restlessness', 'sweating', 'diarrhoea', 'fast heart rate', 'excessive hunger', 'muscle weakness', 'irritability', 'abnormal menstruation', '', '', '', '', '', '', ''),
(248, 'Hyperthyroidism', 'fatigue', 'mood swings', 'weight loss', 'sweating', 'diarrhoea', 'fast heart rate', 'excessive hunger', 'muscle weakness', 'irritability', 'abnormal menstruation', '', '', '', '', '', '', ''),
(249, 'Hyperthyroidism', 'fatigue', 'mood swings', 'weight loss', 'restlessness', 'diarrhoea', 'fast heart rate', 'excessive hunger', 'muscle weakness', 'irritability', 'abnormal menstruation', '', '', '', '', '', '', ''),
(250, 'Hyperthyroidism', 'fatigue', 'mood swings', 'weight loss', 'restlessness', 'sweating', 'fast heart rate', 'excessive hunger', 'muscle weakness', 'irritability', 'abnormal menstruation', '', '', '', '', '', '', ''),
(251, 'Hyperthyroidism', 'fatigue', 'mood swings', 'weight loss', 'restlessness', 'sweating', 'diarrhoea', 'excessive hunger', 'muscle weakness', 'irritability', 'abnormal menstruation', '', '', '', '', '', '', ''),
(252, 'Hyperthyroidism', 'fatigue', 'mood swings', 'weight loss', 'restlessness', 'sweating', 'diarrhoea', 'fast heart rate', 'muscle weakness', 'irritability', 'abnormal menstruation', '', '', '', '', '', '', ''),
(253, 'Hypoglycemia', 'vomiting', 'fatigue', 'anxiety', 'sweating', 'headache', 'nausea', 'blurred and distorted vision', 'excessive hunger', 'slurred speech', 'irritability', 'palpitations', '', '', '', '', '', ''),
(254, 'Hypoglycemia', 'vomiting', 'fatigue', 'anxiety', 'sweating', 'headache', 'nausea', 'blurred and distorted vision', 'excessive hunger', 'drying and tingling lips', 'slurred speech', 'irritability', 'palpitations', '', '', '', '', ''),
(255, 'Hypoglycemia', 'fatigue', 'anxiety', 'sweating', 'headache', 'nausea', 'blurred and distorted vision', 'excessive hunger', 'drying and tingling lips', 'slurred speech', 'irritability', 'palpitations', '', '', '', '', '', ''),
(256, 'Hypoglycemia', 'vomiting', 'anxiety', 'sweating', 'headache', 'nausea', 'blurred and distorted vision', 'excessive hunger', 'drying and tingling lips', 'slurred speech', 'irritability', 'palpitations', '', '', '', '', '', ''),
(257, 'Hypoglycemia', 'vomiting', 'fatigue', 'sweating', 'headache', 'nausea', 'blurred and distorted vision', 'excessive hunger', 'drying and tingling lips', 'slurred speech', 'irritability', 'palpitations', '', '', '', '', '', ''),
(258, 'Hypoglycemia', 'vomiting', 'fatigue', 'anxiety', 'headache', 'nausea', 'blurred and distorted vision', 'excessive hunger', 'drying and tingling lips', 'slurred speech', 'irritability', 'palpitations', '', '', '', '', '', '');
INSERT INTO `symptoms` (`symp_id`, `disease`, `symptom_1`, `symptom_2`, `symptom_3`, `symptom_4`, `symptom_5`, `symptom_6`, `symptom_7`, `symptom_8`, `symptom_9`, `symptom_10`, `symptom_11`, `symptom_12`, `symptom_13`, `symptom_14`, `symptom_15`, `symptom_16`, `symptom_17`) VALUES
(259, 'Hypoglycemia', 'vomiting', 'fatigue', 'anxiety', 'sweating', 'nausea', 'blurred and distorted vision', 'excessive hunger', 'drying and tingling lips', 'slurred speech', 'irritability', 'palpitations', '', '', '', '', '', ''),
(260, 'Hypoglycemia', 'vomiting', 'fatigue', 'anxiety', 'sweating', 'headache', 'blurred and distorted vision', 'excessive hunger', 'drying and tingling lips', 'slurred speech', 'irritability', 'palpitations', '', '', '', '', '', ''),
(261, 'Hypoglycemia', 'vomiting', 'fatigue', 'anxiety', 'sweating', 'headache', 'nausea', 'excessive hunger', 'drying and tingling lips', 'slurred speech', 'irritability', 'palpitations', '', '', '', '', '', ''),
(262, 'Osteoarthristis', 'joint pain', 'neck pain', 'knee pain', 'hip joint pain', 'swelling joints', 'painful walking', '', '', '', '', '', '', '', '', '', '', ''),
(263, 'Osteoarthristis', 'neck pain', 'knee pain', 'hip joint pain', 'swelling joints', 'painful walking', '', '', '', '', '', '', '', '', '', '', '', ''),
(264, 'Osteoarthristis', 'joint pain', 'knee pain', 'hip joint pain', 'swelling joints', 'painful walking', '', '', '', '', '', '', '', '', '', '', '', ''),
(265, 'Osteoarthristis', 'joint pain', 'neck pain', 'hip joint pain', 'swelling joints', 'painful walking', '', '', '', '', '', '', '', '', '', '', '', ''),
(266, 'Osteoarthristis', 'joint pain', 'neck pain', 'knee pain', 'swelling joints', 'painful walking', '', '', '', '', '', '', '', '', '', '', '', ''),
(267, 'Osteoarthristis', 'joint pain', 'neck pain', 'knee pain', 'hip joint pain', 'painful walking', '', '', '', '', '', '', '', '', '', '', '', ''),
(268, 'Osteoarthristis', 'joint pain', 'neck pain', 'knee pain', 'hip joint pain', 'swelling joints', '', '', '', '', '', '', '', '', '', '', '', ''),
(269, 'Arthritis', 'muscle weakness', 'stiff neck', 'swelling joints', 'movement stiffness', 'painful walking', '', '', '', '', '', '', '', '', '', '', '', ''),
(270, 'Arthritis', 'stiff neck', 'swelling joints', 'movement stiffness', 'painful walking', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(271, 'Arthritis', 'muscle weakness', 'swelling joints', 'movement stiffness', 'painful walking', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(272, 'Arthritis', 'muscle weakness', 'stiff neck', 'movement stiffness', 'painful walking', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(273, 'Arthritis', 'muscle weakness', 'stiff neck', 'swelling joints', 'painful walking', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(274, 'Arthritis', 'muscle weakness', 'stiff neck', 'swelling joints', 'movement stiffness', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(275, '(vertigo) Paroymsal  Positional Vertigo', 'vomiting', 'headache', 'nausea', 'spinning movements', 'loss of balance', 'unsteadiness', '', '', '', '', '', '', '', '', '', '', ''),
(276, '(vertigo) Paroymsal  Positional Vertigo', 'headache', 'nausea', 'spinning movements', 'loss of balance', 'unsteadiness', '', '', '', '', '', '', '', '', '', '', '', ''),
(277, '(vertigo) Paroymsal  Positional Vertigo', 'vomiting', 'nausea', 'spinning movements', 'loss of balance', 'unsteadiness', '', '', '', '', '', '', '', '', '', '', '', ''),
(278, '(vertigo) Paroymsal  Positional Vertigo', 'vomiting', 'headache', 'spinning movements', 'loss of balance', 'unsteadiness', '', '', '', '', '', '', '', '', '', '', '', ''),
(279, '(vertigo) Paroymsal  Positional Vertigo', 'vomiting', 'headache', 'nausea', 'loss of balance', 'unsteadiness', '', '', '', '', '', '', '', '', '', '', '', ''),
(280, '(vertigo) Paroymsal  Positional Vertigo', 'vomiting', 'headache', 'nausea', 'spinning movements', 'unsteadiness', '', '', '', '', '', '', '', '', '', '', '', ''),
(281, '(vertigo) Paroymsal  Positional Vertigo', 'vomiting', 'headache', 'nausea', 'spinning movements', 'loss of balance', '', '', '', '', '', '', '', '', '', '', '', ''),
(282, 'Acne', 'skin rash', 'pus filled pimples', 'blackheads', 'scurring', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(283, 'Acne', 'pus filled pimples', 'blackheads', 'scurring', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(284, 'Acne', 'skin rash', 'blackheads', 'scurring', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(285, 'Acne', 'skin rash', 'pus filled pimples', 'scurring', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(286, 'Acne', 'skin rash', 'pus filled pimples', 'blackheads', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(287, 'Urinary tract infection', 'burning micturition', 'bladder discomfort', 'foul smell of urine', 'continuous feel of urine', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(288, 'Urinary tract infection', 'bladder discomfort', 'foul smell of urine', 'continuous feel of urine', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(289, 'Urinary tract infection', 'burning micturition', 'foul smell of urine', 'continuous feel of urine', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(290, 'Urinary tract infection', 'burning micturition', 'bladder discomfort', 'continuous feel of urine', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(291, 'Urinary tract infection', 'burning micturition', 'bladder discomfort', 'foul smell of urine', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(292, 'Psoriasis', 'skin rash', 'joint pain', 'skin peeling', 'silver like dusting', 'small dents in nails', 'inflammatory nails', '', '', '', '', '', '', '', '', '', '', ''),
(293, 'Psoriasis', 'joint pain', 'skin peeling', 'silver like dusting', 'small dents in nails', 'inflammatory nails', '', '', '', '', '', '', '', '', '', '', '', ''),
(294, 'Psoriasis', 'skin rash', 'skin peeling', 'silver like dusting', 'small dents in nails', 'inflammatory nails', '', '', '', '', '', '', '', '', '', '', '', ''),
(295, 'Psoriasis', 'skin rash', 'joint pain', 'silver like dusting', 'small dents in nails', 'inflammatory nails', '', '', '', '', '', '', '', '', '', '', '', ''),
(296, 'Psoriasis', 'skin rash', 'joint pain', 'skin peeling', 'small dents in nails', 'inflammatory nails', '', '', '', '', '', '', '', '', '', '', '', ''),
(297, 'Psoriasis', 'skin rash', 'joint pain', 'skin peeling', 'silver like dusting', 'inflammatory nails', '', '', '', '', '', '', '', '', '', '', '', ''),
(298, 'Psoriasis', 'skin rash', 'joint pain', 'skin peeling', 'silver like dusting', 'small dents in nails', '', '', '', '', '', '', '', '', '', '', '', ''),
(299, 'Impetigo', 'skin rash', 'high fever', 'blister', 'red sore around nose', 'yellow crust ooze', '', '', '', '', '', '', '', '', '', '', '', ''),
(300, 'Impetigo', 'high fever', 'blister', 'red sore around nose', 'yellow crust ooze', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(301, 'Impetigo', 'skin rash', 'blister', 'red sore around nose', 'yellow crust ooze', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(302, 'Impetigo', 'skin rash', 'high fever', 'red sore around nose', 'yellow crust ooze', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(303, 'Impetigo', 'skin rash', 'high fever', 'blister', 'yellow crust ooze', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(304, 'Impetigo', 'skin rash', 'high fever', 'blister', 'red sore around nose', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `confirm_password` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(1) NOT NULL,
  `address` varchar(50) NOT NULL,
  `phone_number` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `user_name`, `email`, `password`, `confirm_password`, `dob`, `gender`, `address`, `phone_number`) VALUES
(1, 'Lucy', 'Mary', 'lucky', 'lucmary@gmail.com', '$2y$10$OXKcOUN/A9pAeFGykQvb4.GTKY8N8//XENfSxTC7IiZ', '$2y$10$8CHk.IYb3IPQ/XUIEy54ju8AeeZZvdjjeriMr248rfH', '1998-06-16', 'f', 'Mombasa', '0712345678');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `description`
--
ALTER TABLE `description`
  ADD PRIMARY KEY (`desc_id`);

--
-- Indexes for table `precaution_remedy`
--
ALTER TABLE `precaution_remedy`
  ADD PRIMARY KEY (`disease_id`);

--
-- Indexes for table `severity`
--
ALTER TABLE `severity`
  ADD PRIMARY KEY (`sev_id`);

--
-- Indexes for table `symptoms`
--
ALTER TABLE `symptoms`
  ADD PRIMARY KEY (`symp_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
