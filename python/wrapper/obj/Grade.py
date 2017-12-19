import re, logging, copy

import API
import GradeItem

logger = logging.getLogger(__name__)

class Grade(object):
    
    def __init__(self, grade_item, student, comment):
        '''
        Constructor for Grade object.
        
        Preconditions:
            grade_item (GradeItem) : GradeItem object that contains the grade.
            student (OrgMember) : OrgMember object of the student that has the grade.
            comment (str) : String that contains a comment for the student's grade item.
            
        Postconditions:
            Grade object for grade item and student is initialized.
        '''
        if type(self) == Grade:
            raise TypeError("Grade must be subclassed")
        #There bits are common to all grade objects
        self._json = {
                    "UserId": student.get_id(),
                    "OrgUnitId": student.get_org_id(),
                    "Comments": {"Content":comment,"Type":"Text"},
                    "PrivateComments": {"Content":"", "Type":"Text"}
                    }
        self._grade_item = grade_item
        self._student = student

    def get_json(self):
        '''
        Function to return a deep copy of the JSON object.
        
        Preconditions:
            self (Grade) : Grade object instance.
            
        Postconditions:
            Returns a deep copy of the JSON object for the student with respect to this GradeItem.
        '''
        return copy.deepcopy(self._json)
        
    def get_comment(self):
        ''' 
        Function to return comments for this student with respect to this GradeItem.
        
        Preconditions:
            self (Grade) : Grade object instance.
        
        Postconditions:
            Returns a comment's content (str) in the JSON object for the student with respect to this GradeItem.
        '''
        return self._json['Comments']['Content']

    def get_grade_item(self):
        ''' 
        Function to return the GradeItem Object.
        
        Preconditions:
            self (Grade) : Grade object instance.
            
        Postconditions:
            Returns the GradeItem object that this Grade object belongs to.
        '''
        return self._grade_item        
        
    def get_student(self):
        ''' 
        Function to return the student object (OrgMember).
        
        Preconditions:
            self (Grade) : Grade object instance.
        
        Postconditions:
            Returns the OrgMember object for the student that owns this grade.
        '''
        return self._student
        
    def get_user(self):
        ''' 
        Function to return the user.
        
        Preconditions:
            self (Grade) : Grade object instance.
            
        Postconditions:
            Returns:
                The GradeItem object that contains this grade.
        '''
        return self._grade_item.get_user()

    def put_grade(self):
        '''
        Function to call the API function to update the grade.
        
        Preconditions:
            self (Grade) : Grade object instance.
            
        Postconditions:
            API put_grade function is called and the grade is updated.
        '''
        API.put_grade(self)

class NumericGrade(Grade):
    '''
    Class for NumericGrades that contains a student's numeric grade value and comment.
    '''
    
    def __init__(self, grade_item, student, comment, value):
        '''
        Constructor for a NumericGrade object.
        
        Preconditions:
            grade_item (GradeItem) : GradeItem object that contains the numeric grade.
            student (OrgMember) : OrgMember object of the student that has the grade.
            comment (str) : String that contains a comment for the student's grade item.
            value (float) : Grade student obtained on the grade item.
            
        Postconditions:
            NumericGrade object for grade item and student is initialized.
        '''
        max_value = grade_item.get_max()
        #assert float(value) doesnt work the way it should, needs to be try/except to get the right err msg
        try:
            float(value)
        except:
            raise ValueError('Grade must be a number')
        assert float(value) <= max_value or grade_item.can_exceed(), 'Grade is more than the grade maximum'.format( max_value )
        assert float(value) >= 0, 'Grade cannot be negative'
        
        super().__init__(grade_item, student, comment)
        self._json['GradeObjectType'] = 1
        self._json['PointsNumerator'] = float(value)

    def get_value(self):
        '''
        Returns value of the NumericGrade item.
        
        Preconditions:
            self (Grade) : Grade object instance.
            
        Postconditions:
            Returns:
                A float grade value in the JSON object for the student with respect to this GradeItem.
        '''
        return float(self._json['PointsNumerator'])
        
