# Fullstack_kehittaminen

## Ohjelman toiminta:

                  1. Ladataaan index
                  2. Oppilas, Opettaja vai Default käyttäjä?
                    2.1 Default käyttäjä
                      - Näkymä: home, faq ja logosta -> vaihe 2.
                    2.2 Opettaja
                      - Näkymä: home, faq, raportti, palaute(feedback) ja logosta -> vaihe 2.
                      - Toiminnallisuudet:
                        - Raportti:
                          -> Mahdollisuus nähdä visuaalisesti tietokannan dataa raportti sivulla
                          -> Mahdollisuus ladata pdf-tiedoston datasta
                        - Palaute/Feedback
                          -> Ladataan kaikki testit ja koko sivu(ei AJAX, looppi)
                            -> AJAX
                              - send_feedback.php
                              - delete_feedback.php
                              - search-toiminto -> load_tests.php
                            -> jQuery
                              - sendFeedback()
                              - deleteFeedback()
                              - loadStudents()
                    2.3 Oppilas -> (submit-student -> create_student())
                      - Onko oppilas olemassa? if-else
                        - ON:
                          -> Ladataan koko sivu kerran(ei AJAX)
                          -> Testi tehty? if
                            - ON:
                              - Hyväksytty || Hylätty
                                -> Näytetään testi
                                TAI
                            - EI:
                              -> Näytetään tekemättä jäänyt testi
                        - EI:
                          -> create_student() - if(isset(submit-student))
                            1. Tallennetaan oppilaan tiedot muuttujiin
                              - $first_name
                              - $last_name
                              - $email
                            2. -> vaihe 2.3
                            3. SQL(INSERT) -> Uusi käyttäjä db tauluun -> student
                            4. SQ(SELECT) -> Haetaan studentID
                              - $studentID
                            5. SQL(SELECT) -> Haetaan random testi tietokannasta
                                    - $questionID
                                    - Tallennetaan questionTableValues Arrayhin
                                    - kysymyssarjan key => values
                                    - SQL(INSERT)
                                      -> Tauluihin test & reward uudet tyhjät rivit tietokantaan
                                        - Käytetään tähän mennessä haettuja muuttujia:
                                        - $studentID
                                        - $questionID

                            6. Luodaan oliot:
                              - student
                              - test
                              - reward
                              - question_series
                            7. Tallennetaan oliot JSON-tiedostoihin(file kansio):
                              - student.json
                              - test.json
                              - reward.json
                              - question_series.json
                            8. Luodaan ja näytetään random testi
                            9. Funktio loppuu
                              - test ja reward taulut
                              - jäävät odottamaan päivityksiä
                              - testien teosta ja palautteista(SQL:UPDATE)




