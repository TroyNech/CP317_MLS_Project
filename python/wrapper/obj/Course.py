import GradeItem, OrgMember, API

class Course(object):
    '''
    
    '''
    
    def __init__(self,user,course_params):
        """
        user (user object) - info about user
        course_params - info about course (Enrollment.MyOrgUnitInfo) 
        """
        self._name      = course_params['OrgUnit']['Name']
        self._id        = course_params['OrgUnit']['Id']
        self._user_role = course_params['Role']['Name']#need to update to use Number Instead
        self._user = user
        self._grade_items = API.get_grade_items(self)
        self._members = API.get_class_list(self)


    def get_grade_items(self):
        """
        Function will return all the current grade object (Numeric) for current course
        return:
            Gradeitems - list
        """
        return self._grade_items

    def get_grade_item(self,id):
        try:
            return [grade_item for grade_item in self._grade_items if str(grade_item.get_id()) == str(id)][0]
        except:
            return None
    
    def get_id(self):
        """
        Function will return the id for the current course
        PostCondition:
            reutrn self.id - Id for the current course
        """
        return self._id    
    
    def get_name(self):
        """
        Function will return the name of course
        PostCondition:
            return self.name - current course name
        """
        return self._name

    def get_member(self,org_id):
        """
        Function will return the member request if it exist, 
        Otherwise, it return None
        """
        for member in self._members:
            if member.get_org_id() == org_id:
                return member
        return None        

    def get_members(self,role=[]):
        """
        Function will return all the users for the current course
        return :
            list of Orgmember
        """
        if role != []:
            items=[]
            for member in self._members:
                if member.get_role() in role:
                    items.append(member)
            return items 
        return self._members
        
    def get_user(self):
        """
        Function will return the user object
        PostCondition:
            return self._user - user 
        """
        return self._user
        
    def get_user_role(self):
        """
        Function will return the user fole for current course
        PostCondition:
            reutrn self.user_role - user role for current course
        """
        return self._user_role
